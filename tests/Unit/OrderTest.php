<?php

namespace Tests\Unit;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderGoodCollection;
use App\Order;
use App\OrderGoods;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_order_collection()
    {
        $collection = (new OrderCollection(Order::all()))->toArray([]);
        $this->assertTrue(true);
        $this->assertArrayHasKey('name', $collection[0]);
    }

    public function test_order_good_collection()
    {
        $collection = (new OrderGoodCollection(OrderGoods::all()))->toArray([]);
        $this->assertTrue(true);
        $this->assertArrayHasKey('name', $collection[0]);
    }
}
