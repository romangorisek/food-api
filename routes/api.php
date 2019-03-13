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
        Route::prefix('meals')->group(function () {
            Route::get('/', 'MealController@all');
            Route::post('/', 'MealController@create');
            Route::get('/{id}', 'MealController@get');
            Route::put('/{id}', 'MealController@update');
            Route::delete('/{id}', 'MealController@delete');
        });
        Route::prefix('dishes')->group(function () {
            Route::get('/', 'DishController@all');
            Route::post('/', 'DishController@create');
            Route::get('/{id}', 'DishController@get');
            Route::put('/{id}', 'DishController@update');
            Route::delete('/{id}', 'DishController@delete');
        });
    });        
});
