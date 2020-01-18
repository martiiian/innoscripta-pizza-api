<?php

use Tests\TestCase;

class SizesTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_ingredients_list()
    {
        $response = $this->json('get', '/api/sizes');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    [
                        'name',
                        'code'
                    ]
                ]
            ]);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_find_ingredient()
    {
        $id = \App\Size::first()->id;
        $response = $this->json('get', "/api/sizes/$id");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'code'
                ]
            ]);
    }
}
