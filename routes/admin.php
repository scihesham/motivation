<?php

/* please note that offer_id refers to offer_status_id */

Route::group(['middleware' => ['web', 'admin']], function(){

/* admin controller */
 Route::get('admin', 'AdminController@index');
  
 /* UserController */
 Route::resource('admin/users', 'UserController');
 Route::get('admin/users/{id}/delete', 'UserController@destroy');
    
 /* ProjectController */   
 Route::resource('admin/projects', 'ProjectController');
 Route::get('admin/projects/{id}/delete', 'ProjectController@destroy');

 /* OfferStatusController */
 Route::get('admin/offers/{project_id}', 'OfferStatusController@index');
 Route::get('admin/offer/{offer_id}', 'OfferStatusController@show');
 Route::get('admin/offer/{id}/delete', 'OfferStatusController@destroy');
    
    
 /* MessageController */    
 Route::get('admin/messages/{offer_id}', 'MessageController@show');
    
 /* MilestoneController */   
 Route::get('admin/milestone/{offer_id}', 'MilestoneController@show');
    
 /* DisputeController */   
 Route::get('admin/project/offer/disputes', 'DisputeController@index');
 Route::get('admin/project/offer/disputes/{dispute_id}', 'DisputeController@edit_dispute');
 Route::patch('admin/project/offer/disputes/{dispute_id}', 'DisputeController@update_dispute');
 Route::get('admin/messages/disputes/{dispute_id}', 'DisputeController@showDisputeMessage');
 Route::post('admin/milestone/dispute/{milestone_id}', 'DisputeController@storedispute');
 Route::get('admin/messages/disputes/{dispute_id}', 'DisputeController@showDisputeMessage');
 Route::post('admin/judge/disputes/{dispute_id}', 'DisputeController@judge');

    
});

