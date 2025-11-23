<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(111),
                'roles' => 'admin',
            ],
            //Admin
            [
                'name' => 'employ',
                'email' => 'user@gmail.com',
                'password' => Hash::make(111),
                'roles' => 'user',
            ],
        ]);
    }
}