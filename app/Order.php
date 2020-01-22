<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected static $delivery_price = 3;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'delivery_price',
        'user_id',
        'updated_at'
    ];

    public static function store($data)
    {
        $newOrder = new self;
        $newOrder->fill([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'delivery_price' => self::$delivery_price,
            'user_id' => $data['user_id']
        ]);
        $newOrder->save();
        return $newOrder;
    }

    public function user()
    {
        return $this->hasOne('App\Users');
    }

    public function goods()
    {
        return $this->hasMany('App\OrderGoods');
    }
}
