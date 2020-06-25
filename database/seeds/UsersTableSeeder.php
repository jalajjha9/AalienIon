<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jalaj Jha',
            'email' => 'jalajjha9@gmail.com',
            'password' => Hash::make('jalaj@1234'),
            'remember_token' => str_random(10),
        ]);
    }
}
