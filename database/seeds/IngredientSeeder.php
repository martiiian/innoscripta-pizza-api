<?php

use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{

    public $ingredients = [
        'фета',
        'пармезан',
        'чеддер',
        'копченый сыр',
        'сулугуни',
        'дор блю',
        'эменталлер',
        'мягкий сыр',
        'смесь прованских трав',
        'моцарелла, соус'
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
