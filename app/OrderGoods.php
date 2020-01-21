<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderGoods extends Model
{
    protected $fillable = [
        'name',
        'size',
        'size_price',
        'count',
        'order_id'
    ];

    public static function store($goods, $order_id)
    {
        $data = [];
        foreach($goods as $good) {
            $product = Good::find($good['productId']);
            $good_size = GoodsSizes::find($good['sizeId']);
            $size = Size::find($good_size['size_id']);
            $data[] = [
                'name' => $product->name,
                'size' => $size->name,
                'size_price' => $good_size->price,
                'count' => $good['count'],
                'order_id' => $order_id
            ];
        }

        DB::table('order_goods')->insert($data);
    }
}
