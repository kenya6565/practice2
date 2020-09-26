<?php
namespace App\Library;
use App;

class BaseClass
{
    public static function counts($user) {
        $count_followings = $user->followings()->count();
        $count_followers = $user->followers()->count();

        return [
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
        ];
    }
}
