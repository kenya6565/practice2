<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [  
        'id',
        'user_id',
        'post_id',
        'comment',
    ];
    
    public static $rules = array(
        'comment' => ['required', 'string', 'max:140'], 
    );
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
