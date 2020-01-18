<?php

use Tests\TestCase;
use App\Ingredient;

class IngredientsTest extends TestCase
{

    public $structure = [
        'name'
    ];

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
                    $this->structure
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
        $ingredient_id = Ingredient::first()->id;
        $response = $this->json('get', "/api/ingredients/$ingredient_id");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => $this->structure
            ]);
    }
}
