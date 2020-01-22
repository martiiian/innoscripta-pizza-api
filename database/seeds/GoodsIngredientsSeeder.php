<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Ingredient;
use App\Good;

class GoodsIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goods = Good::all();
        $ingredients = Ingredient::all();
        $goodsIngredientsArr = [];
        foreach ($goods as $good) {
            $maxIngredients = rand(3, 8);
            $ingredientIndex = 1;
            foreach ($ingredients as $ingredient) {
                if ($maxIngredients < $ingredientIndex) continue;
                $goodsIngredientsArr[] = [
                    'ingredient_id' => $ingredient->id,
                    'good_id' => $good->id,
                ];
                $ingredientIndex++;
            }
        }
        DB::table('goods_ingredients')->insert($goodsIngredientsArr);
    }
}
