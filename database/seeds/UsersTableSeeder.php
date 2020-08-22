<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 開発用ユーザーを定義
        App\User::create([
            'name' => 'テストユーザー',
            'email' => 'testUser@realopinion.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('password'), //password」でログインできる
            'remember_token' => chr(mt_rand(97, 122)).chr(mt_rand(97, 122)).chr(mt_rand(97, 122)),
            'icon' => null,
        ]);

        //100件のテストユーザーを登録する 
        for( $cnt = 1; $cnt <= 20; $cnt++ ) { 
            $faker = Faker\Factory::create('ja_JP');
    
            User::create([
                'name' => $faker->lastName. ' ' . $faker->firstName,
                'email' => $faker->email,
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('testtest'),
                'remember_token' => chr(mt_rand(97, 122)).chr(mt_rand(97, 122)).chr(mt_rand(97, 122)),
                'icon' => null,
            ]);
        }

        //エラーが出るのでローカル環境でのみ使うようにする
        // モデルファクトリーで定義したテストユーザーを 20 作成
        //factory(App\User::class, 20)->create();
    }
}
