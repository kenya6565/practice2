<?php

use Illuminate\Database\Seeder;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $like = new \App\Like([
            'user_id' => '1',
            'post_id' => '2',
            ]);
        $like->save();
        
        $like = new \App\Like([
            'user_id' => '1',
            'post_id' => '3',
            ]);
        $like->save();
        
        $like = new \App\Like([
            'user_id' => '2',
            'post_id' => '1',
            ]);
        $like->save();
        
        $like = new \App\Like([
            'user_id' => '3',
            'post_id' => '2',
            ]);
        $like->save();
    }
}
