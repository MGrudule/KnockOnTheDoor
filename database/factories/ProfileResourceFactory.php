<?php

use Faker\Generator as Faker;

$factory->define(App\ProfileResource::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,5),
        'qualifier_id' => rand(1,3),
        'resource_id' => rand(1,5),
    ];
});
