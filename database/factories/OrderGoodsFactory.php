<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderGoods;
use Faker\Generator as Faker;

$factory->define(OrderGoods::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'size' => $faker->text(5),
        'size_price' => $faker->numberBetween(15, 40),
        'count' => $faker->numberBetween(1, 5),
        'order_id' => null
    ];
});
