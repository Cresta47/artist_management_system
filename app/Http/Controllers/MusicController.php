<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicFormRequest;
use App\Models\Artist;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    public function index($artistId)
    {
        $artist = Artist::where("id", $artistId)->first();

        if(isset($artist)) {
            $songs = Music::where("artist_id", $artistId)->latest()->get();
            return view('artist.music.index', compact('songs', "artist"));
        }

    }

    public function create($artistId)
    {
        $artist = Artist::where("id", $artistId)->first();

        if(isset($artist)) {
            return view("artist.music.create", compact("artist"));
        }
    }

    public function store(MusicFormRequest $request, $artistId)
    {
        $artist = Artist::where("id", $artistId)->first();

        if(isset($artist)) {
            $validatedData = $request->validated();
            $artist->music()->create($validatedData);
        }


        return redirect()->route('artist.music.index', $artist->id)->withSuccess("Music  created for artist " . $artist->name ." successfully");
    }

    public function edit($artistId, $musicId)
    {
        $artist  = Artist::where("id", $artistId)->first();
        $song = Music::whereId($musicId)->where("artist_id", $artistId)->first();

        if(isset($song) && isset($artist)) {
            return view('artist.music.edit', compact("artist", "song"));
        }
    }

    public function update(MusicFormRequest $request, $artistId, $musicId)
    {
        $validatedData = $request->validated();
        $artist  = Artist::where("id", $artistId)->first();
        $song = Music::whereId($musicId)->where("artist_id", $artistId)->first();


        if (!isset($song) && !isset($music)) {
            return redirect()->route('access-denied');
        }

        $artist->music()->where("id", $musicId)->update($validatedData);

        return redirect()->route('artist.music.index', $artist->id)->withSuccess("Song updated successfully");
    }

    public function destroy($artistId, $songId) {

        $artist = Artist::whereId($artistId)->first();

        if (!isset($artist)) {
            return response()->json(['status' => false, "message" => "Artist not found."]);
        }

        $song = Music::whereId($songId)->first();

        if (!isset($song)) {
            return response()->json(['status' => false, "message" => "Song not found."]);
        }


        DB::beginTransaction();
        try {
            $song->delete();

            DB::commit();
            return response()->json(['status' => true, "message" => "Successfully deleted Song"]);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, "message" => "Something went wrong."]);
        }

    }


}
