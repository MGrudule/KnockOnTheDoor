<?php

use Faker\Generator as Faker;

$factory->define(App\ProfileResource::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,5),
        'qualifier' => $faker->randomElement([
            "I'm interested in",
            "I can help with",
            "I have",
        ]),
        'resource_id' => rand(1,5),
    ];
});
