<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Good;
use Faker\Generator as Faker;

$factory->define(Good::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'description' => $faker->text(240),
        'is_visible' => $faker->boolean(80),
        'image_name' => $faker->text(200)
    ];
});
