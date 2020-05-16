<?php

use Illuminate\Database\Seeder;

class LmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call(UserSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
