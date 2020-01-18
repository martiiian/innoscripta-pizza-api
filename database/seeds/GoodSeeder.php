<?php

use Illuminate\Database\Seeder;
use \App\Good;

class GoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Good::class, 8)->create();
    }
}
