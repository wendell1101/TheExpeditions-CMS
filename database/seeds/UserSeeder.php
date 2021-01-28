<?php

use App\User;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'wendell suazo', 
            'slug' => 'wendell-suazo', 
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('wendell1101'),
        ]);
    }
}
