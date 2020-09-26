<?php

use Illuminate\Database\Seeder;

class FollowRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $follow_request = new \App\FollowRequest([
            'user_id' => '4',
            'following_id'  => '2',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
    
        $follow_request = new \App\FollowRequest([
            'user_id' => '4',
            'following_id'  => '3',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '4',
            'following_id'  => '6',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '4',
            'following_id'  => '10',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '11',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '12',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '13',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '14',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '15',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '16',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '17',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '18',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '19',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
        
        $follow_request = new \App\FollowRequest([
            'user_id' => '20',
            'following_id'  => '4',
            'is_follow_requesting' => 1
        ]);
        $follow_request->save();
    }
}
