<?php

namespace App\Http\Controllers;

use App\Meal;

class MealController extends CrudController
{
    protected $model = Meal::class;
    protected $fields = ['title'];
}
