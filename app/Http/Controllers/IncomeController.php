<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;

class IncomeController extends CrudController
{
    protected $model = Income::class;
    protected $fields = ['title'];

    public function all()
    {
        return Income::allSortedByClicks();
    }
}
