<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use \App\Post;

class TopController extends Controller
{
    public function index()
    {
        $collection = 
            collect([
                'effeltower.jpeg',
                'thai.jpg',
                'australia.jpeg',
                'colosseo.jpeg',
                'pyramid.jpg',
                'shanghai.jpg',
                'dessert.jpeg',
                'greatbarrier.webp',
                'mtfuji.jpeg',
                'Tajmahal.jpeg',
            ]);
        $random =  $collection->random();
        
        return view('welcome',compact('random'));
    }
    
    public function ascendingOrder()
    {
        $all_posts = Post::orderBy('created_at','asc')->paginate(9);
        
        if (Auth::check()) {
            return view('user.timeline.index',compact(
                'all_posts'
            ));
        }else{
            return view('guest.timeline.index',compact(
                'all_posts'
            ));
        }
       
       
    }
    
    public function  descendingOrder()
    {
       
        $all_posts = Post::orderBy('created_at','desc')->paginate(9);
        
        if (Auth::check()) {
            return view('user.timeline.index',compact(
                'all_posts'
            ));
        }else{
            return view('guest.timeline.index',compact(
                'all_posts'
            ));
        }
    }
   
    
}
