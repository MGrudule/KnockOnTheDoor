<?php

use App\Message;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'message_id' => Message::inRandomOrder()->first()->id,
        'comment' => $faker->text(500, true),
    ];
});
