<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('user.index')->with('users',User::all());
    }

    public function edit(User $user){
        return view('user.edit-profile')->with('user',auth()->user());
    }

    public function update(Request $request,User $user){
        $this->validate($request,[
            'name' => 'required',
            'about' => 'required',
        ]);

        $user->update([
           'name' => $request->name,
           'about' => $request->about,
        ]);

        session()->flash('success','profile updated successfully');
         return redirect()->back();
    }

    public function makeAdmin(User $user){
        $user->role = 'admin';
        $user->save();
        session()->flash('success','user made admin successfully');
        return redirect(route('users.index'));
    }
}
