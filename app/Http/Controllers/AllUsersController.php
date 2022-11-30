<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gym;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AllUsersController extends Controller
{
    #=======================================================================================#
    #			                           List Function                                	#
    #=======================================================================================#
    public function list()
    {
        $usersFromDB =  User::role('user')->withoutBanned()->get();
        if (count($usersFromDB) <= 0) { //for empty statement
            return view('empty');
        }
        return view("allUsers.list", ['users' => $usersFromDB]);
    }

    #=======================================================================================#
    #			                           Show Function                                	#
    #=======================================================================================#
    public function show($id)
    {
        $singleUser = User::findorfail($id);
        return view("allUsers.show", ['singleUser' => $singleUser]);
    }
    #=======================================================================================#
    #			                           Delete Function                                	#
    #=======================================================================================#
    public function deleteUser($id)
    {
        $singleUser = User::findorfail($id);
        $singleUser->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }


    #=======================================================================================#
    #			                        Assign Gym To User                              	#
    #=======================================================================================#
    public function addGym($id)
    {
        $singleUser = User::findorfail($id);
        return view('allUsers.addGym', [
            'user' => User::find($id),
            'gyms' => Gym::all(),
        ]);
    }

    public function submitGym(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $request->validate([
            'gym_id' => 'required',
        ]);
        $user->gym_id = $request->gym_id;
        $user->update(['gym_id' => $request->gym_id]);
        $usersFromDB =  User::role('user')->withoutBanned()->get();
        return view("allUsers.list", ['users' => $usersFromDB]);
    }

    #=======================================================================================#
    #			                        Edit Function                                       #
    #=======================================================================================#
    public function edit($id)
    {
        $users = User::all();
        $singleUser = User::find($id);
        return view("allUsers.edit", ['singleUser' => $singleUser]);
    }

    #=======================================================================================#
    #			                        Update Function                                     #
    #=======================================================================================#
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'profile_image' => 'mimes:jpg,jpeg',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
            if (isset($user->profile_image))
                File::delete(public_path('imgs/' . $user->profile_image));
            $user->profile_image = $imageName;
        }
        $user->save();
        return redirect()->route('allUsers.list');
    }

    #=======================================================================================#
    #			                        Store Function                                     #
    #=======================================================================================#

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required'],
            'profile_image' => ['nullable', 'mimes:jpg,jpeg'],
            'password' => ['required']
        ]);

        if ($request->hasFile('profile_image') == null) {
            $imageName = 'imgs/defaultImg.jpg';
        } else {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->national_id =  rand(10000000000, 999999999999);
        $user->password = bcrypt($request->password);
        $user->profile_image = $imageName;
        $user->assignRole('user');
        $user->save();
        return redirect()->route('allUsers.list');
    }

    #=======================================================================================#
    #			                           Create Function                              	#
    #=======================================================================================#
    public function create()
    {
        return view('allUsers.create', [
            'users' => User::all(),
        ]);
    }
}
