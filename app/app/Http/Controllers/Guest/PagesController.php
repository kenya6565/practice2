<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\BaseClass;
use \App\User;
use \App\Post;
use \App\Follow;
use Hash;

class PagesController extends Controller
{
    public function show(Request $request)
    {
        $user_info = User::find($request->id);
        $counts = BaseClass::counts($user_info);
        $posts = Post::where('user_id',$request->id)
                   ->orderBy('created_at','DESC')
                   ->paginate(9);
      
        return view('guest.users.index',compact(
            'posts',
            'user_info',
            'counts'
        ));
    }
}
