<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsSizes extends Model
{
    protected $fillable = [
        'good_id',
        'size_id',
        'price'
    ];
}
