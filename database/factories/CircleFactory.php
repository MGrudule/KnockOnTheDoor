<?php

use Faker\Generator as Faker;

$factory->define(App\Circle::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->word),
        'description' => $faker->sentence,
    ];
});
