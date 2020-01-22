<?php

namespace Tests\Feature;

use App\Good;
use App\Order;
use App\Size;
use App\User;
use Tests\TestCase;


class OrderTest extends TestCase
{
    public $structure = [
        'id',
        'name',
        'address',
        'phone',
        'delivery_price',
        'created_at',
        'goods' => [
            [
                'name',
                'size',
                'size_price',
                'count'
            ]
        ]
    ];

    /**
     * @return array
     * [
     *  [
     *   'productId' => int,
     *   'count' => int,
     *   'sizeId' => int
     *  ]
     * ]
     */
    public function getGoodsForCreateOrder() {
        $goods = Good::take(3)->get();
        $size = Size::where('code', 'small')->first();
        $data = [];
        foreach ($goods as $good) {
            $data[] = [
                'productId' => $good->id,
                'count' => 2,
                'sizeId' => $size->id
            ];
        }
        return $data;
    }

    public function test_list()
    {
        $response = $this->json('get', '/api/orders');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    $this->structure
                ]
            ]);
    }

    public function test_find_by_user_id()
    {
        $user_id = User::first()->id;
        $response = $this->json('get', "/api/orders/user/$user_id");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    $this->structure
                ]
            ]);
    }

    public function test_find_by_id()
    {
        $order_id = Order::first()->id;
        $response = $this->json('get', "/api/orders/$order_id");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => $this->structure
            ]);
    }

    public function test_create()
    {
        $order = factory(Order::class, 1)
            ->state('for_request')
            ->make()
            ->toArray()[0];
        $order['goods'] = $this->getGoodsForCreateOrder();
        $response = $this->json('POST', '/api/orders', $order);
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => $this->structure
            ]);
    }
}
