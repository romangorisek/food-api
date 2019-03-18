<?php

namespace App\Http\Controllers;

use App\DishIngredient;

class DishIngredientsController extends CrudController
{
    protected $model = DishIngredient::class;
    protected $fields = ['dish_id', 'ingredient_id'];
}