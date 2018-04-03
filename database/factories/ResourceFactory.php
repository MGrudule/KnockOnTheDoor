<?php

use Faker\Generator as Faker;

$factory->define(App\Resource::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->words(rand(1,3), true)),
        'description' => $faker->sentence,
    ];
});
