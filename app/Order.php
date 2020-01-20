<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'delivery_price',
        'user_id',
        'updated_at'
    ];

    public function user()
    {
        return $this->hasOne('App\Users');
    }
}
