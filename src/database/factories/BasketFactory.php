<?php

use Faker\Generator as Faker;
use App\Models\Basket;

$factory->define(Basket::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween(1, 5),
        'discount' => $faker->numberBetween(5, 75),
        'created_at' => $faker->dateTimeBetween('-1 year'),
    ];
});
