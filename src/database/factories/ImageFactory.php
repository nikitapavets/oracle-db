<?php

use Faker\Generator as Faker;
use App\Models\Image;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'link' => $faker->imageUrl(),
        'type' => $faker->numberBetween(1, 5),
    ];
});
