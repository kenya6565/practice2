<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;

class FollowsController extends Controller
{
    public function showFollowings($id)
    {
        $following_users = User::find($id)->followings()->paginate(9);
        $user_info = User::find($id);
        
        return view('guest.follow.followings',compact(
            'following_users',
            'user_info'
        ));
    }

    public function showFollowers($id)
    {
        $followers = User::find($id)->followers()->paginate(9);
        $user_info = User::find($id);
        
        return view('guest.follow.followers', compact(
            'followers',
            'user_info'
        ));
    }
}
