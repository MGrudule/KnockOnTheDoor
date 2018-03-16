<?php

use Faker\Generator as Faker;

$factory->define(App\Resource::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->words(4, true)),
        'description' => $faker->sentence(50, true),
    ];
});
