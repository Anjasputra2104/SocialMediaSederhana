<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordUpdateController extends Controller
{
    public function edit()
    {
        return view('users.password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'oldPassword' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
    
        if (Hash::check($request->oldPassword, auth()->user()->password)) {
            auth()->user()->update(['password' => bcrypt($request->password)]);
            return redirect(route('profile', auth()->user()->username))->with('success', 'Your Password Has been Updated');
        }

        throw ValidationException::withMessages([
            'oldPassword' => 'Your old Password doeas not match',
        ]);

    }
}
