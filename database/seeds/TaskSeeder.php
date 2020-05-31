<?php

use Illuminate\Database\Seeder;
use App\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('tasks')->delete();
        Task::create([
            'subject_id' => 1,
            'name' => 'Jó kis matek feladat',
            'about' => 'Próbáljatok minél többet megoldani ezek közül',
            'score' => 10,
            'starting_at' => '2020-05-30',
            'ending_at' => '2020-06-14'
        ]);

        Task::create([
            'subject_id' => 1,
            'name' => 'ZH felkészítő',
            'about' => 'Sok sikert a feladatokhoz!',
            'score' => 50,
            'starting_at' => '2020-06-10',
            'ending_at' => '2020-06-11'
        ]);

        Task::create([
            'subject_id' => 2,
            'name' => 'C++ 3-ik beadandó',
            'about' => 'Hamarosan jövök a részletekkel',
            'score' => 120,
            'starting_at' => '2020-06-04',
            'ending_at' => '2020-06-24'
        ]);
    }
}
