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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* UserController */
Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

/* CityController */
Route::get('cities', 'Api\CityController@index');

/* CategoryController */
Route::get('categories', 'Api\CategoryController@index');


Route::group(['middleware' => 'auth:api'], function(){
  
    Route::get('profile', 'Api\UserController@details');
    

    
});