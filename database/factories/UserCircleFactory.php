<?php

use Faker\Generator as Faker;

$factory->define(App\UserCircle::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,5),
        'circle_id' => rand(1,5),
    ];
});
