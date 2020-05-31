<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => "Dr. Nagy Elek",
            'email' => "nagyelek@gmail.com",
            'password' => Hash::make('12345678'),
            'role'=>'teacher'
        ]);
        DB::table('users')->insert([
            'name' => "Dr. Péter",
            'email' => "peter@gmail.com",
            'password' => Hash::make('12345678'),
            'role'=>'teacher'
        ]);
        DB::table('users')->insert([
            'name' => "Gipsz Jakab",
            'email' => "jakab@gmail.com",
            'password' => Hash::make('12345678'),
            'role'=>'student'
        ]);
    }
}
