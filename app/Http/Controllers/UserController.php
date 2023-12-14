<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function name()
    {
        $users = User::orderBy('id')->get();
        return view('user.index', ['users' => $users]);
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/user')->with('message', 'A new user has been added');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user -> update($request->all());
        return redirect('/user')->with('message', "$user->name has been updated.");
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('/user')->with('message', "$user->name has been deleted.");
    }


}
