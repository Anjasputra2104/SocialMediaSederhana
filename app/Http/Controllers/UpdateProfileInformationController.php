<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UpdateProfileInformationController extends Controller
{
    public function edit(User $user)
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['string', 'min:3', 'max:25', 'required'], 
            'email' => ['email', 'string', 'min:3', 'max:25', 'required'], 
            'username' => ['required',  'alpha_num', 'unique:users,username,' . auth()->id()],
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect(route('profile', auth()->user()->username))->with('success', 'Your Profile has been Updated');
    }
}
