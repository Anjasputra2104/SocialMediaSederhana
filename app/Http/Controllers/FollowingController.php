<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function index(User $user, $following)
    {

        if ($following !== "follower" && $following !== "following"){
            return redirect(route('profile', $user->username));
        }
        return view('users.following', [
            'user' => $user,
            'follow' => $following == "following" ? $user->follows : $user->follower,
        ]);
    }
    
    // public function store(User $user)
    // {
    //     Auth::user()->hasFollows($user)
    //         ? Auth::user()->unFollow($user)
    //         : Auth::user()->follow($user);

    //     return back()->with('success', 'Berhasill Follow' . $user->name);
    // }

    public function follow(User $user)
    {
        Auth::user()->follow($user);

        return back()->with('success', 'Berhasill Follow'. ' ' . $user->name);
    }
    
    public function unFollow(User $user)
    {
        Auth::user()->unFollow($user);

        return back()->with('success', 'Berhasill Unfollow' . ' ' . $user->name);
    }



    // public function following(User $user)
    // {
    //     return view('users.following', [
    //         'following' => $user->follows,
    //         'user' => $user,
    //     ]);
    // }
    // public function follower(User $user)
    // {
    //     return view('users.following', [
    //         'following' => $user->follower,
    //         'user' => $user,
    //     ]);
    // }
}
