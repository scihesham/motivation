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
Route::get('myprofile', 'Front\FrontController@profile');
Route::patch('myprofile', 'Front\FrontController@updateprofile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web', 'auth']], function(){
    
 /* ProjectController */   
 Route::resource('projects', 'Front\ProjectController');
 Route::get('projects/{id}/delete', 'Front\ProjectController@destroy');
 Route::get('search/projects', 'Front\ProjectController@search');
 Route::get('confirmdone/project/{project_id}', 'Front\ProjectController@confirmdone');
 Route::get('notification/projects', 'Front\ProjectController@projectNotification');
    
 /* OfferStatusController */
 Route::get('offer/project/{project_id}', 'Front\OfferStatusController@create');
 Route::post('offer/project/{project_id}', 'Front\OfferStatusController@store');
 Route::patch('offer/project/{offer_id}', 'Front\OfferStatusController@update');
 Route::get('offer/project/{offer_id}/award', 'Front\OfferStatusController@awardProject');
    
    
 /* MessageController */    
 Route::get('messages/{offer_id}', 'Front\MessageController@index');
 Route::post('messages/{offer_id}', 'Front\MessageController@store'); 
 Route::get('message/othersend/{offer_id}', 'Front\MessageController@checkMsgOtherSend');
 Route::get('notification/messages', 'Front\MessageController@notification');
    
    
 /* MilestoneController */
 Route::get('milestone/release/{milestone_id}', 'Front\MilestoneController@release');
 Route::get('milestone/dispute/{milestone_id}', 'Front\MilestoneController@createdispute');
 Route::post('milestone/dispute/{milestone_id}', 'Front\MilestoneController@storedispute');
 Route::get('milestone/dispute/show/{milestone_id}', 'Front\MilestoneController@showdispute');
    

});





