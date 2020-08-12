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
        User::create([
            'name' => 'ゲスト',
            'email' => 'guest@example.com',
            'password' => 'guestguest'
            ]);
    }
}
