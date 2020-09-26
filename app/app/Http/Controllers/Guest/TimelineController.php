<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use \App\Post;
use \App\PostPhoto;
use \App\Comment;
use \App\User;

class TimelineController extends Controller
{
    public function index(Request $request)
    {
        if($request->sort == "asc"){
            $all_posts = Post::orderBy('id','ASC')->paginate(9);
        }else{
            $all_posts = Post::orderBy('id','DESC')->paginate(9);
        }
        
        return view('guest.timeline.index',compact(
            'all_posts'
        ));
    }
   
   public function show(Request $request)
    {
        //クリックした投稿のID
        $post = Post::find($request->id);
        $user_info = User::find($post->user_id);
        $images = $post->photos;
         //dd($images);
        $recent_posts = Post::where('user_id',$post->user_id)
                            ->whereNotIn('id',[$post->id])
                            ->get();
     
        //１つの投稿を表示する際それについてるコメントを表示
        $comments = Comment::where('post_id',$post->id)->get();
       
        return view('guest.timeline.detail', compact(
            'post',
            'comments',
            'recent_posts',
            'images',
            'user_info'
        ));
    }
}
