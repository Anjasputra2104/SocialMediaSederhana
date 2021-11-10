<?php

namespace App\Traits;

use App\Models\User;

Trait following {

    public function follows()
    {
        return $this->belongsToMany(User::class,'_follows_', 'user_id', 'following_user_id')->withTimestamps();
    }
    public function follower()
    {
        return $this->belongsToMany(User::class,'_follows_', 'following_user_id', 'user_id')->withTimestamps();
    }
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }
    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function hasFollows(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }



}