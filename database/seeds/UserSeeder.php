<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ゲスト',
            'email' => 'guest@example.com',
            'password' => Hash::make('guestguest'),
            'profile' => 'ゲストアカウントです！',
            'image' => '',
            'youtube' => 'https://www.youtube.com/',
        ]);
    }
}
