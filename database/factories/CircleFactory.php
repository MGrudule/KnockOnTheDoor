<?php

use App\Circle;
use Faker\Generator as Faker;

$factory->define(Circle::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->unique()->word),
        'description' => $faker->sentence,
    ];
});
