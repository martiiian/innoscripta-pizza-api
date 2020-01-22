<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsIngredients extends Model
{
    protected $fillable = [
        'ingredient_id',
        'good_id'
    ];
}
