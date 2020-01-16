<?php

use Tests\TestCase;

class IngredientsTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_ingredients_list()
    {
        $response = $this->json('get', '/api/ingredients');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    [
                        'name'
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
        $id = \App\Ingredient::first()->id;
        $response = $this->json('get', "/api/ingredients/$id");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'name'
                ]
            ]);
    }
}
