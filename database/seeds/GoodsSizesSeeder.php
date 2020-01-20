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
        $goodsSizesArr = [];
        foreach ($goods as $good) {
            foreach ($sizes as $size) {
                $goodsSizesArr[] = [
                    'size_id' => $size->id,
                    'good_id' => $good->id
                ];
            }
        }
        DB::table('goods_sizes')->insert($goodsSizesArr);
    }
}
