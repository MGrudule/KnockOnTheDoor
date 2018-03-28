<?php

use App\User;
use App\Resource;
use Faker\Generator as Faker;

$factory->define(App\ProfileResource::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'qualifier_id' => rand(1,3), //TODO
        'resource_id' => Resource::inRandomOrder()->first()->id,
    ];
});
