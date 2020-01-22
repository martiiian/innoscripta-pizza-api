<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            IngredientSeeder::class,
            SizeSeeder::class,
            GoodSeeder::class,
            GoodsSizesSeeder::class,
            GoodsIngredientsSeeder::class,
            OrderSeeder::class
        ]);
    }
}
