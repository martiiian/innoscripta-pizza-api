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
}
