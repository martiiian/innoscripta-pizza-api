<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            [
                'name' => 23,
                'code' => 'small',
            ],
            [
                'name' => 30,
                'code' => 'middle',
            ],
            [
                'name' => 35,
                'code' => 'big',
            ]
        ]);
    }
}
