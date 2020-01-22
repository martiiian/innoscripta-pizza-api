<?php

use Illuminate\Database\Seeder;
use App\Good;
use App\Size;
use Illuminate\Support\Facades\DB;

class GoodsSizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goods = Good::all();
        $sizes = Size::all();
        $prices = [
            'small' => 3,
            'middle' => 4,
            'big' => 5
        ];
        $goodsSizesArr = [];
        foreach ($goods as $good) {
            $coeficient = rand(1, 2);
            foreach ($sizes as $size) {
                $goodsSizesArr[] = [
                    'size_id' => $size->id,
                    'good_id' => $good->id,
                    'price' => $prices[$size->code] * $coeficient
                ];
            }
        }
        DB::table('goods_sizes')->insert($goodsSizesArr);
    }
}
