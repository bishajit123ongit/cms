<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UpdateProfileRequest;

class UsersController extends Controller
{
    public function Index()
    {
        return view('users.index')->with('users',User::all());
    }

    public function makeAdmin(User $user)
    {
		$user->role='admin';
		$user->save();

		session()->flash('success','Make this user into admin successfully!');
		return redirect(route('users.index'));
    }

    public function edit()
    {
        return view('users.edit')->with('user',auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user=auth()->user();

        $user->update([
          'name'=>$request->name,
          'about'=>$request->about

        ]);
        $msg= __('translateproperties.userupdatemsg');

        session()->flash('success', $msg);
        return redirect()->back();
    }
}
