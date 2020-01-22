<?php

use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{

    public $ingredients = [
        'Feta',
        'Parmesan',
        'Cheddar',
        'Smoked cheese',
        'Suluguni',
        'Dor Blue',
        'Ementaller',
        'Soft cheese',
        'A mixture of provence herbs',
        'Mozzarella sauce'
    ];

    public $index = 0;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ingredient::class, count($this->ingredients))
            ->create()
            ->each(function ($ingredient) {
                $ingredient->name = $this->ingredients[$this->index];
                $ingredient->save();
                $this->index++;
            });
    }
}
