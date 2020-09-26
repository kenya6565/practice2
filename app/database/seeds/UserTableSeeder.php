<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $user = new \App\User([
            'name' => '田中太郎',
            'email' => 'user1@user.com',
            'password' => bcrypt('tarou')
            ]);
        $user->save();
        
        //2
        $user = new \App\User([
            'name' => '藤田達郎',
            'email' => 'user2@user.com',
            'password' => bcrypt('tatsurou'),
            'is_private' =>1
            ]);
            
        $user->save();
        
        //3
        $user = new \App\User([
            'name' => '今井美樹',
            'email' => 'user3@user.com',
            'password' => bcrypt('mikimiki'),
            'is_private' =>1
            ]);
        $user->save();
        
        //4
        $user = new \App\User([
            'name' => 'テストユーザー',
            'email' => 'test@user.com',
            'password' => bcrypt('testuser'),
            'profile' => '旅行が好きでいろいろな国に興味があります。よろしくお願いします。',
            'is_private' =>1
            ]);
        $user->save();
        
        //5
        $user = new \App\User([
            'name' => '吉田ジェシカ',
            'email' => 'user5@user.com',
            'password' => bcrypt('yoshijeshika')
            ]);
        $user->save();
        
        //6
        $user = new \App\User([
            'name' => '村田光',
            'email' => 'hikari@user.com',
            'password' => bcrypt('hikari1'),
            'is_private' =>1
            ]);
        $user->save();
        
        //7
        $user = new \App\User([
            'name' => '近藤貴大',
            'email' => 'kondoutakahiro@user.com',
            'password' => bcrypt('kontaka')
            ]);
        $user->save();
        
        //8
        $user = new \App\User([
            'name' => 'James',
            'email' => 'james@user.com',
            'password' => bcrypt('james1234')
            ]);
        $user->save();
        
        //9
        $user = new \App\User([
            'name' => 'Tom',
            'email' => 'tom@user.com',
            'password' => bcrypt('tommy')
            ]);
        $user->save();
            
        //10
        $user = new \App\User([
            'name' => 'Mike',
            'email' => 'mike@user.com',
            'password' => bcrypt('mikey'),
            'is_private' =>1
            ]);
        $user->save();
        
        
        //11
        $user = new \App\User([
            'name' => 'Jay',
            'email' => 'jay@user.com',
            'password' => bcrypt('11111111'),
            'is_private' =>1
            ]);
        $user->save();
        
        //12
        $user = new \App\User([
            'name' => 'あおい',
            'email' => 'aoi@user.com',
            'password' => bcrypt('11111111'),
            'is_private' =>1
            ]);
        $user->save();
        
        //13
        $user = new \App\User([
            'name' => '相田翔子',
            'email' => 'shoko@user.com',
            'password' => bcrypt('11111111'),
            'is_private' =>1
            ]);
        $user->save();
        
        //14
        $user = new \App\User([
            'name' => '持田薫',
            'email' => 'mochi@user.com',
            'password' => bcrypt('11111111'),
            'is_private' =>1
            ]);
        $user->save();
        
        //15
        $user = new \App\User([
            'name' => '権田武',
            'email' => 'take@user.com',
            'password' => bcrypt('8484800'),
            'is_private' =>1
            ]);
        $user->save();
        
        //16
        $user = new \App\User([
            'name' => 'Shone',
            'email' => 'shone@user.com',
            'password' => bcrypt('shonehhhh'),
            'is_private' =>1
            ]);
        $user->save();
        
        //17
        $user = new \App\User([
            'name' => '西島さやか',
            'email' => 'sayaka@user.com',
            'password' => bcrypt('yayayyayychan'),
            'is_private' =>1
            ]);
        $user->save();
        
        //18
        $user = new \App\User([
            'name' => '渡辺志織',
            'email' => 'shiori@user.com',
            'password' => bcrypt('shioriooooo'),
            'is_private' =>1
            ]);
        $user->save();
        
        //19
        $user = new \App\User([
            'name' => '横田龍一',
            'email' => 'ryuuichi@user.com',
            'password' => bcrypt('ryuuryuu'),
            'is_private' =>1
            ]);
        $user->save();
        
        //20
        $user = new \App\User([
            'name' => '斎藤航',
            'email' => 'wata@user.com',
            'password' => bcrypt('wataruuuuu'),
            'is_private' =>1
            ]);
        $user->save();
    }
    
}
