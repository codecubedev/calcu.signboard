<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Apple',
            'email' => 'apple@gmail.com',
            'password' => Hash::make('12345678'),
            'login_type' => '1',

        ]);
        DB::table('users')->insert([
            'name' => 'Nikko',
            'email' => 'nikko@gmail.com',
            'password' => Hash::make('12345678'),
            'login_type' => '1',

        ]);
        DB::table('users')->insert([
            'name' => 'Chen',
            'email' => 'chen@gmail.com',
            'password' => Hash::make('12345678'),
            'login_type' => '2',

        ]);           
        DB::table('users')->insert([
            'name' => 'Sim',
            'email' => 'sim@gmail.com',
            'password' => Hash::make('12345678'),
            'login_type' => '2',

        ]);
        DB::table('users')->insert([
            'name' => 'Kelly',
            'email' => 'kelly@gmail.com',
            'password' => Hash::make('12345678'),
            'login_type' => '2',

        ]);
    }
}
