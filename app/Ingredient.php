<?php

namespace App;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    public function dishes()
    {
        return $this->belongsToMany('App\Dish');
    }
}
