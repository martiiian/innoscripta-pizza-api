<?php

use Illuminate\Database\Seeder;
use \App\Good;

class GoodSeeder extends Seeder
{
    public $path = '/goods/';
    public $images = [
        'alfredo.jpg',
        'carbonara.jpg',
        'fermer.jpg',
        'gavaiskay.jpg',
        'home.jpg',
        'hunter.jpg',
        'peperoni.jpg',
        'vegetarian.jpg'
    ];

    public $names = [
        'Alfredo',
        'Carbonara',
        'Fermer',
        'Gavaisaya',
        'Homemade',
        'Hunter',
        'Peperoni',
        'Vegetarian'
    ];

    public $index = 0;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Good::class, 8)
            ->create()
            ->each(function ($product) {
                $product->name = $this->names[$this->index];
                $product->image_name = $this->path . $this->images[$this->index];
                $product->save();
                $this->index++;
            });
    }
}
