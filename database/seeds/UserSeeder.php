<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = DB::table('users')->insert([
        //     'fname' => 'Patrick',
        //     'lname' => 'Asu',
        //     'email' => 'patrickasu@gmail.com',
        //     'admin' => 1,
        //     'password' => Hash::make('1111111111'),
        //     'updated_at' => Carbon::now(),
        //     'created_at' => Carbon::now()
        // ]);
        // DB::table('profiles')->insert([
        //     'user_id' => $user->id,
        //     'avatar' => '/profiles/1.png',
        //     'about' => 'In ante lorem, commodo non vehicula ut, tincidunt sit amet dui. Integer in quam ac massa bibendum vehicula. Praesent accumsan vel turpis id venenatis. Etiam id lorem in tortor sagittis gravida. Nulla at purus mi.',
        //     'facebook' => 'facebook.com',
        //     'instagram' => 'instagram.com',
        //     'twitter' => 'twitter.com',
        // ]);



        $user = App\User::create([
            'fname' => 'Daniel',
            'lname' => 'Zoma',
            'email' => 'zoma@gmail.com',
            'admin' => 1,
            'password' => Hash::make('admin123'),
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => '/profiles/1.png',
            'about' => 'In ante lorem, commodo non vehicula',
            'facebook' => 'facebook.com',
            // 'instagram' => 'instagram.com',
            // 'twitter' => 'twitter.com',
        ]);
    }
}
