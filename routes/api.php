<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resources([
    'ingredients' => 'IngredientController',
    'sizes' => 'SizeController',
    'goods' => 'GoodController',
    'orders' => 'OrderController'
]);
Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::get('/orders/user/{id}', 'OrderController@indexUserId')
        ->where('id', '[0-9]+');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function ($router) {
    Route::post('/login', 'AuthController@login');

    Route::group([
        'middleware' => 'auth:api'
    ], function ($router) {
        Route::post('/logout', 'AuthController@logout');
        Route::post('/refresh', 'AuthController@refresh');
        Route::post('/me', 'AuthController@me');
    });
});
