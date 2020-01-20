<?php

use Tests\TestCase;
use App\Size;

class SizesTest extends TestCase
{

    public $structure = [
        'id',
        'name',
        'code'
    ];

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_sizes_list()
    {
        $response = $this->json('get', '/api/sizes');

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
    public function test_find_size()
    {
        $size_id = Size::first()->id;
        $response = $this->json('get', "/api/sizes/$size_id");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => $this->structure
            ]);
    }
}
