<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Http\Resources\Ingredient as IngredientResource;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return IngredientResource::collection(Ingredient::all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return IngredientResource|array
     */
    public function show($id)
    {
        $ingredient = Ingredient::find($id);

        return $ingredient->count() > 0
            ? new IngredientResource($ingredient)
            : [];
    }
}
