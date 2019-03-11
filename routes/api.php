<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['catchExceptions', 'api']], function() {

    Route::post('register', 'UserController@register');

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');    
    });

    Route::group(['middleware' => ['client', 'auth:api']], function() {
        Route::prefix('accounts')->group(function () {
            Route::get('/', 'AccountController@all');
            Route::post('/', 'AccountController@create');
            Route::get('/{id}', 'AccountController@get');
            Route::put('/{id}', 'AccountController@update');
            Route::delete('/{id}', 'AccountController@delete');
        });
        Route::prefix('transactions')->group(function () {
            Route::get('/', 'TransactionController@all');
            Route::post('/', 'TransactionController@create');
            Route::get('/{id}', 'TransactionController@get');
            Route::put('/{id}', 'TransactionController@update');
            Route::delete('/{id}', 'TransactionController@delete');
        });
        Route::prefix('expenses')->group(function () {
            Route::get('/', 'ExpenseController@all');
            Route::post('/', 'ExpenseController@create');
            Route::get('/{id}', 'ExpenseController@get');
            Route::put('/{id}', 'ExpenseController@update');
            Route::delete('/{id}', 'ExpenseController@delete');
        });
        Route::prefix('incomes')->group(function () {
            Route::get('/', 'IncomeController@all');
            Route::post('/', 'IncomeController@create');
            Route::get('/{id}', 'IncomeController@get');
            Route::put('/{id}', 'IncomeController@update');
            Route::delete('/{id}', 'IncomeController@delete');
        });        
    });        
});
