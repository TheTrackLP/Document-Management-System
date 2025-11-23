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
                'roles' => '2',
            ],
            //Employee
            [
                'name' => 'employee',
                'email' => 'employee@gmail.com',
                'password' => Hash::make(111),
                'roles' => '1',
            ],
        ]);
    }
}