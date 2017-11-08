<?php

use Faker\Generator as Faker;
use App\Models\City;

$factory->define(City::class, function (Faker $faker) {
    return [
        'title' => $faker->country,
    ];
});
