<?php

use Faker\Generator as Faker;
use App\Models\Notebook;

$factory->define(Notebook::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text(150),
        'config' => $faker->text(150),
        'price' => $faker->numberBetween(350, 3500),
    ];
});
