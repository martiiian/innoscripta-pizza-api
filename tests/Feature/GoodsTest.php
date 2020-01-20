<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Good;


class GoodsTest extends TestCase
{
    public $structure = [
        'id',
        'name',
        'description',
        'is_visible',
        'image_name',
        'ingredients',
        'sizes'
    ];

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_goods_list()
    {
        $response = $this->json('get', '/api/goods');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    $this->structure
                ]
            ]);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_find_good()
    {
        $good_id = Good::first()->id;
        $response = $this->json('get', "/api/goods/$good_id");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => $this->structure
            ]);
    }
}
