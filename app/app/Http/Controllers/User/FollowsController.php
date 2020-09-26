<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\Follow;
use \App\FollowRequest;

class FollowsController extends Controller
{
    public function store($id)
    {
        \Auth::user()->follow($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        return back();
    }
    
    
    //フォローしてるユーザー表示
    public function showFollowings($id)
    {
        $following_users = User::find($id)->followings()->paginate(9);
        $user_info = User::find($id);
        
        return view('user.follow.followings',compact(
            'following_users',
            'user_info'
        ));
    }

    public function showFollowers($id)
    {
        $followers = User::find($id)->followers()->paginate(9);
        $user_info = User::find($id);
        
        return view('user.follow.followers', compact(
            'followers',
            'user_info'
        ));
    }
    
    public function showFollowrequests($id)
    {
        $follow_requesting_users = User::find($id)->follow_requests()->paginate(9);
        $user_info = User::find($id);
      
        return view('user.follow.followrequests',compact(
            'follow_requesting_users',
            'user_info'
        ));
    }
    
    public function followRequest($id)
    {
        \Auth::user()->follow_request($id);
        return back()->with('flash_message', 'フォローリクエストしました');
    }
    
    public function unfollowRequest($id)
    {
        \Auth::user()->unfollow_request($id);
        return back()->with('flash_message', 'フォローリクエストを取り消しました');
    }
    
    public function followApprove($id)
    {
        FollowRequest::where('user_id',$id)->where('following_id',Auth::id())->delete();
        Follow::create([
            'user_id' => $id,
            'following_id' => Auth::id(),
            'is_follow_requesting' => 0,
        ]);
        return back();
    }
    
    public function followDecline($id)
    {
        FollowRequest::where('user_id',$id)->where('following_id',Auth::id())->delete();
        return back();
    }
}
