<?php

namespace App\Http\Controllers;

use App\Ingredient;

class IngredientController extends CrudController
{
    protected $model = Ingredient::class;
    protected $fields = ['title'];
}