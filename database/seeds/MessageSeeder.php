<?php

use App\Message;
use App\Subject;
use App\User;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a message for every user, with a random subject
        foreach (User::all() as $user) {
            $subject = Subject::inRandomOrder()->first();
            Message::create([
                "user_id" => $user->id,
                "subject_id" => $subject->id,
                "body" => "Gardening",
            ]);
        }

    }
}
