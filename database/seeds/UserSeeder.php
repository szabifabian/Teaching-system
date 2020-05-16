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
        //
        DB::table('users')->insert([
            'name' => "Dr. Nagy Elek",
            'email' => "nagyelek@gmail.com",
            'password' => '$2y$10$8YVrxcvumOp7KmGCacZ3geVqqL0Gyl4f2vjKP2UAu1jy0gs1Greqa',
            'role'=>'teacher'
        ]);
        DB::table('users')->insert([
            'name' => "Dr. Péter",
            'email' => "peter@gmail.com",
            'password' => '$2y$10$fXGC9zFlkiW.jqddOla/L.MXyX9ianuTVFCHHVTCUgO9HTtz2Lak6',
            'role'=>'teacher'
        ]);
        DB::table('users')->insert([
            'name' => "Gipsz Jakab",
            'email' => "jakab@gmail.com",
            'password' => '$2y$10$F.9FRh2PnG8v2AbmxKvbmOh65lURIvEDk63ft0xacHLHVE/WEsegC',
            'role'=>'student'
        ]);
    }
}
