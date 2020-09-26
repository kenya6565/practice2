<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
            'title' => 'エッフェル塔 フランス',
            'post' => 'フランスに行ったら必ず行こうと思っていた場所!!',
            'user_id' => '1',
     
        ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => 'ピラミッド エジプト',
            'post' => 'こんな巨大な建築物が数百年も前に作られたなんて想像できない。。。',
            'user_id' => '1',
     
        ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => 'ピザの斜塔 イタリア',
            'post' => '本当に斜めっていた！',
            'user_id' => '2',
        ]);
        $post->save();
        
       
        
        $post = new \App\Post([
            'title' => 'オペラハウス オーストラリア',
            'post' => '中には入れなかったけど近くにあったレストランで景色を見ながら食事を楽しめました',
            'user_id' => '3',
     
            ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => 'Mt.Fuji Japan',
            'post' => 'It was the best mountain that i have ever seen. you must see it on your eyes!!',
            'user_id' => '8',
     
            ]);
        $post->save();
        
        $post = new \App\Post([
            'title' => '鶴岡八幡宮 日本',
            'post' => 'たくさんの観光客が訪れておりとても興味深かった',
            'user_id' => '4',
     
            ]);
        $post->save();
        
        }
        
}
