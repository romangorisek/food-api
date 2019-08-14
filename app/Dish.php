<?php

namespace App;

class Dish extends Model
{
    protected $table = 'dishes';

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }
}
