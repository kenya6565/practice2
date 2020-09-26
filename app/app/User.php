<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'user_icon_image',
        'profile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static $rules = array(
        'profile' => 'max:150', 
        'name' => 'required',
        'email' => 'required',
        'current-password' => 'required',
        'new-password' => 'required|string|min:8|confirmed',
      
    );
    
    public function posts()
    {
         return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    //あるユーザのフォロー中のユーザを取得する
    public function followings()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_id')->withTimestamps();
    }
    //あるユーザのフォロワーとなっているユーザ を取得する
    public function followers()
    {
        return $this->belongsToMany(User::class,'follows','following_id','user_id')->withTimestamps();
    }

    public function is_following($userId)
    {
        return $this->followings()->where('following_id', $userId)->exists();
    }
    
    public function follow($userId)
    {
        // すでにフォロー済みではないか？
        $existing = $this->is_following($userId);
        // フォローする相手がユーザ自身ではないか？
        $myself = $this->id == $userId;
    
        // フォロー済みではない、かつフォロー相手がユーザ自身ではない場合、フォロー
        if (!$existing && !$myself) {
            $this->followings()->attach($userId);
        }
    }
    
    public function unfollow($userId)
    {
        // すでにフォロー済みではないか？
        $existing = $this->is_following($userId);
        // フォローする相手がユーザ自身ではないか？
        $myself = $this->id == $userId;
    
        // すでにフォロー済みならば、フォローを外す
        if ($existing && !$myself) {
            $this->followings()->detach($userId);
        }
    }
  
    public function likes()
    {
        //あるユーザがどの投稿にいいねしているかを見る
        //Userクラスが、likesテーブルを通して、Postクラスと繋がっている
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamps();
    }

    public function like($postId)
    {
        //いいね
        $exist = $this->is_liking($postId);

        if($exist){
            return false;
            
        }else{
            $this->likes()->attach($postId);
            return true;
        }
    }

    public function unlike($postId)
    {
        //いいね解除
        $exist = $this->is_liking($postId);

        if($exist){
            $this->likes()->detach($postId);
            return true;
        }else{
            return false;
        }
    }

    public function is_liking($postId)
    {
        //ある投稿に対してpost_idがあるか
        return $this->likes()->where('post_id',$postId)->exists();
    }
    
    public function follow_requests()
    {
         return $this->belongsToMany(User::class, 'follow_requests', 'following_id', 'user_id')->withTimestamps();
    }
    
    public function is_follow_requesting($id)
    {
        return FollowRequest::where('is_follow_requesting',1)->where('user_id',Auth::id())->where('following_id',$id)->exists();
    }
    
    public function follow_request($followed_requested_user_id)
    {
        //followsテーブルを更新
        //user_idにuserクラスのid入れてfollowing_idに取ってきた引数のIDいれる
        $follow = new FollowRequest(['user_id'=>Auth::id(), 'following_id'=>$followed_requested_user_id]);
        //フォロリクされてないならフォロリク状態(1)にする
        if($follow->is_follow_requesting == 0){
            $follow->is_follow_requesting= 1;
        }else{
            $follow->is_follow_requesting = 0;
        }
            $follow->save();
    }
    
    public function unfollow_request($unfollowed_requested_user_id)
    {
        FollowRequest::where('user_id',Auth::id())->where('following_id',$unfollowed_requested_user_id)->delete();
    }
    
    public function lock()
    {
        $this->is_private = 1; 
        $this->save();
    }
    
    public function unlock()
    {
        $this->is_private = 0; 
        $this->save();
    }
    
    public function is_locked($id)
    {
        return $this->where('is_private',1)->where('id',$id)->exists();
    }
    
    public function is_unlocked($id)
    {
        return $this->where('is_private',1)->where('id',$id)->doesntExist();
    }
    
}
