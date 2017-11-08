<?php

use Faker\Generator as Faker;
use App\Models\Brand;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
    ];
});
