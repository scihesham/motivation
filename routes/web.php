<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* please note that offer_id refers to offer_status_id */


Route::get('/', 'Front\FrontController@index');

Auth::routes();


Route::group(['middleware' => ['web', 'auth']], function(){
    

    

});





