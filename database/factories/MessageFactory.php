<?php

use App\Subject;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'subject_id' => Subject::inRandomOrder()->first()->id,
        'body' => $faker->text(250),
    ];
});
