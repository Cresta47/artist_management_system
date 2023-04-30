<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistFormRequest;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::latest()->paginate(20);
        return view('artist.index', compact('artists'));
    }


    public function create() {
        return view('artist.create');
    }

    public function store(ArtistFormRequest $request)
    {
        $validatedData = $request->validated();

        Artist::create($validatedData);

        return redirect()->route('artist.index')->withSuccess("Artist created successfully");
    }

    public function edit($id)
    {
        $artist = Artist::whereId($id)->first();
        return view('artist.edit', compact("artist"));
    }

    public function update(ArtistFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $artist = Artist::whereId($id)->first();

        if (!$artist) {
            return redirect()->route('access-denied');
        }

        $artist->update($validatedData);

        return redirect()->route('artist.index')->withSuccess("Artist updated successfully");
    }

    public function destroy($id) {

        $artist = Artist::whereId($id)->first();

        if (!$artist) {
            return response()->json(['status' => false, "message" => "Artist not found."]);
        }

        DB::beginTransaction();
        try {
            $artist->delete();

            DB::commit();
            return response()->json(['status' => true, "message" => "Successfully deleted Artist"]);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, "message" => "Something went wrong."]);
        }

    }
}
