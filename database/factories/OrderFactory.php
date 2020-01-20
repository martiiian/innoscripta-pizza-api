<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $user_id = User::first();

    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->text(200),
        'delivery_price' => $faker->numberBetween(0, 2000),
        'user_id' => $user_id
    ];
});
