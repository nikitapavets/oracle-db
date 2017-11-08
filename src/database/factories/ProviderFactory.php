<?php

use Faker\Generator as Faker;
use App\Models\Provider;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->randomNumber(),
        'phone' => $faker->phoneNumber,
        'priority' => $faker->numberBetween(1, 100),
    ];
});
