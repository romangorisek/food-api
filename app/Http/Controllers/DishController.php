<?php

namespace App\Http\Controllers;

use App\Dish;

class DishController extends CrudController
{
    protected $model = Dish::class;
    protected $fields = ['title'];
}
