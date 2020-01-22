<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_visible',
        'image_name'
    ];

    public function sizes()
    {
        return $this->belongsToMany(
            'App\Size',
            'goods_sizes',
            'good_id',
            'size_id'
        )->withPivot('price');
    }

    public function ingredients()
    {
        return $this->belongsToMany(
            'App\Ingredient',
            'goods_ingredients',
            'good_id',
            'ingredient_id'
        );
    }
}
