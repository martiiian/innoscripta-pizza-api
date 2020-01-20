<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Order::class, 3)
            ->create()
            ->each(function ($order) {
                factory(\App\OrderGoods::class, 10)->create([
                    'order_id' => $order->id
                ]);
            });
    }
}
