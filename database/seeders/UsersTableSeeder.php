<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Elysa',
                'email' => 'theophaniedjimbi37@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'super_admin',
            ],
            [
                'name' => 'Patrick',
                'email' => 'adadepatrick0@gmail.com',
                'password' =>  Hash::make('password456'),
                'role' => 'admin',
            ],
            [
                'name' => 'Paul Martin',
                'email' => 'paul.martin@example.com',
                'password' => Hash::make('password120'),
                'role' => 'prof',
            ],
        ]);
    }
}
