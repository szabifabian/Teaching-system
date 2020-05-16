<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('subjects')->delete();
        Subject::create([
            'name' => "Matematika",
            'subject_code' => 'IK-MAT998',
            'credit' => 5,
            'user_id'=> 1,
            'about'=> "Ez egy új tárgy",
            'public'=> 1
        ]);

        Subject::create([
            'name' => "Objektumelvű programozás",
            'subject_code' => 'IK-OOP108',
            'credit' => 6,
            'user_id'=> 1,
            'about'=> "C++",
            'public'=> 1
        ]);

        Subject::create([
            'name' => "Szerveroldali webprogramozás",
            'subject_code' => 'IK-SWP104',
            'credit' => 4,
            'user_id'=> 1,
            'about'=> "Laravel",
            'public'=> 1
        ]);

        Subject::create([
            'name' => "Történelem",
            'subject_code' => 'IK-TOR224',
            'credit' => 3,
            'user_id'=> 1,
            'about'=> "Az új töri tárgy teli izgalmakkal",
            'public'=> 0
        ]);

        Subject::create([
            'name' => "Biológia",
            'subject_code' => 'IK-BIO345',
            'credit' => 4,
            'user_id'=> 2,
            'about'=> "új biológia tárgy",
            'public'=> 1
        ]);

        Subject::create([
            'name' => "Mesterséges inteligencia",
            'subject_code' => 'IK-MIT963',
            'credit' => 5,
            'user_id'=> 2,
            'about'=> "következő félévben",
            'public'=> 0
        ]);

        Subject::create([
            'name' => "Társadalom tudomány",
            'subject_code' => 'IK-TTU259',
            'credit' => 2,
            'user_id'=> 2,
            'about'=> "érdekes tárgy",
            'public'=> 1
        ]);
    }
}
