<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangePasswordFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));
    }
    public function profile()
    {
        $user = User::whereId(auth()->user()->id)->first();

        return view("user.profile", compact("user"));
    }

    public function changePassword(UserChangePasswordFormRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::whereId(auth()->user()->id)->first();


        if(isset($user)){
            $user->update(["password" => bcrypt($validatedData["password"])]);

            return response()->json(["status" => true, "message" => "User Password Changed successfully."]);
        }else{
            return response()->json(["status" => false, "message" => "User Not Found."]);
        }
    }


    public function create() {
        return view('user.create');
    }

    public function store(UserFormRequest $request)
    {

        $validatedData = $request->validated();

        $validatedData["password"] = bcrypt($validatedData["password"]);



        User::create($validatedData);

        return redirect()->route('user.index')->withSuccess("User created successfully");
    }

    public function edit($id)
    {
        $user = User::whereId($id)->first();
        return view('user.edit', compact("user"));
    }

    public function update(UserFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $user = User::whereId($id)->first();

        if (!$user) {
            return redirect()->route('access-denied');
        }

        $user->update($validatedData);

        return redirect()->route('user.index')->withSuccess("User updated successfully");
    }

    public function destroy($id) {

        $user = User::whereId($id)->first();

        if (!$user) {
            return response()->json(['status' => false, "message" => "User not found."]);
        }

        DB::beginTransaction();
        try {
            $user->delete();

            DB::commit();
            return response()->json(['status' => true, "message" => "Successfully deleted User"]);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, "message" => "Something wnt wrong."]);
        }

    }

}
