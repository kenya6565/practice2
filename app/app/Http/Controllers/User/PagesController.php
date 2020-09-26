<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use App\Library\BaseClass;
use \App\User;
use \App\Post;
use \App\Follow;
use \App\FollowRequest;
use \App\PostPhoto;
use Hash;
use Storage;

class PagesController extends Controller
{
    
    public function show(Request $request)
    {
        $user_info = User::find($request->id);
        $counts = BaseClass::counts($user_info);
        $posts = Post::where('user_id',$request->id)
                   ->orderBy('created_at','DESC')
                   ->paginate(9);
                   
        $follow_request_sum = FollowRequest::where('following_id',Auth::id())->count();
        
        return view('user.users.index',compact(
            'posts',
            'user_info',
            'counts',
            'follow_request_sum'
            
        ));
    }
    
    public function edit(Request $request)
    {
        $login_user = Auth::user();
        $user_info = Auth::user();
        
        if (empty($login_user)) { 
            abort(404);
        }
        return view('user.users.edit',compact(
            'login_user',
            'user_info'
        ));
    }
    
    public function update(Request $request)
    {
        //dd($request);
         //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }
        //バリデーション
        $this->validate($request, User::$rules);
        $login_user = Auth::user();
        $updated_user_info = $request->all(); 
        
        $login_user->password = bcrypt($request->get('new-password'));
        
        if($request->hasFile('user_icon_image')) { 
            
            //初期に画像は設定していなかったが編集で初めて画像設定する場合はここを通らない
            if($login_user->count('user_icon_image') > 0){
                Storage::disk('s3')->delete('public/images/' .$login_user['user_icon_image'] );
            }
            
            Storage::disk('s3')->put('public/images/',$request->file('user_icon_image'),'public');
            $image_hash = $request->file('user_icon_image')->hashName();
            //fill->saveを使うには配列である必要がある。→$request->file('user_icon_image')を使うことができない。
            $updated_user_info['user_icon_image'] = $image_hash;
        }
        
        $login_user->fill($updated_user_info)->save();
      
        return redirect(route('mypage', ['id'=>Auth::id()]));
    }
    
    public function store()
    {
        \Auth::user()->lock();
        return back()->with('flash_message', '鍵をかけました');
    }

    public function destroy()
    {
        \Auth::user()->unlock();
        return back()->with('flash_message', '鍵を解除しました');
    }
}
