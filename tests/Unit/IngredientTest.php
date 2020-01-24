<?php

namespace Tests\Unit;

use App\Http\Resources\IngredientCollection;
use App\Ingredient;
use Tests\TestCase;

class IngredientTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_ingredient_collection()
    {
        $collection = (new IngredientCollection(Ingredient::all()))->toArray([]);
        $this->assertTrue(true);
        $this->assertArrayHasKey('name', $collection[0]);
    }
}
