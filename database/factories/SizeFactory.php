<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Size::class, function (Faker $faker) {
    return [
        'name' => $faker->numberBetween(25, 45),
        'code' => $faker->lexify('?????')
    ];
});
