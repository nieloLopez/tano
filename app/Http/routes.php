<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/***************------------ Users--------------*******************/


Route::get('admin/', 'Admin\CustomerController@index');
Route::get('admin/customer/add', 'Admin\CustomerController@add');
Route::post('admin/customer/store', 'Admin\CustomerController@store');
Route::get('admin/customer/edit/{id}', 'Admin\CustomerController@edit');
Route::put('admin/customer/update/{id}', 'Admin\CustomerController@update');
Route::delete('admin/customer/disable/{id}', 'Admin\CustomerController@disable');


/***************------------- Activities -------------*******************/
Route::get('admin/activity', 'Admin\ActivitiesController@index');
Route::get('admin/activity/add', 'Admin\ActivitiesController@add');
Route::post('admin/activity/store', 'Admin\ActivitiesController@store');
Route::get('admin/activity/edit/{id}', 'Admin\ActivitiesController@edit');
Route::put('admin/activity/update/{id}', 'Admin\ActivitiesController@update');
Route::delete('admin/activity/disable/{id}', 'Admin\ActivitiesController@disable');


/***************------------- Checkout -------------*******************/
Route::get('admin/checkout/list/{id}', 'Admin\CheckoutController@index');
Route::get('admin/checkout/getPaymentDetails/{id}', 'Admin\CheckoutController@getPaymentDetails');
Route::get('admin/checkout/add/{id}', 'Admin\CheckoutController@add');
Route::get('admin/checkout/edit/{id}', 'Admin\CheckoutController@edit');
Route::post('admin/checkout/finish', 'Admin\CheckoutController@finish');

