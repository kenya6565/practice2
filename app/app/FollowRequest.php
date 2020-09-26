<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowRequest extends Model
{
    protected $fillable = [   
        'user_id',
        'following_id',
        'is_follow_requesting',
    ];
}
