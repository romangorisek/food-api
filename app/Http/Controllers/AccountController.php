<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends CrudController
{
    protected $model = Account::class;
    protected $fields = ['title', 'balance', 'thumb'];

    public function all()
    {
        return Account::allSortedByClicks();
    }
}
