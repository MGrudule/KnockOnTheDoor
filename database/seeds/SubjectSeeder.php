<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            "name" => "Do you have?",
        ]);
        Subject::create([
            "name" => "Can you help?",
        ]);
        Subject::create([
            "name" => "Do you know?",
        ]);
    }

}
