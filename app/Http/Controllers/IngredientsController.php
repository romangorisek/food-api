<?php

namespace App\Http\Controllers;

use App\Ingredient;

class IngredientsController extends CrudController
{
    protected $model = Ingredient::class;
    protected $fields = ['title'];
}