<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends CrudController
{
    protected $model = Client::class;
    protected $fields = ['title', 'ip', 'token'];
}
