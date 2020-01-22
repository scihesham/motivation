<?php

/* please note that offer_id refers to offer_status_id */

Route::group(['middleware' => ['web', 'admin']], function(){

/* admin controller */
 Route::get('admin', 'AdminController@index');
  
 /* UserController */
 Route::resource('admin/users', 'UserController');
 Route::get('admin/users/{id}/delete', 'UserController@destroy');
    
 /* CategoryController */   
 Route::resource('admin/categories', 'CategoryController');
 Route::get('admin/categories/{id}/delete', 'CategoryController@destroy');
    
 /* CompanyController */   
 Route::resource('admin/companies', 'CompanyController');
 Route::get('admin/companies/{id}/delete', 'CompanyController@destroy');
    
 /* ActivityController */   
 Route::resource('admin/activities', 'ActivityController');
 Route::get('admin/activities/{id}/delete', 'ActivityController@destroy');

    
});

