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
Auth::routes(['verify' => false]);
Auth::routes(['reset' => false]);

Route::get('/', 'HomeController@index');

Route::resource('airlines', 'AirlineController');
Route::resource('airports', 'AirportController');
Route::resource('visastatus', 'VisaStatusController');
Route::resource('bookingsources', 'BookingSourceController');
Route::resource('querytypes', 'QueryTypeController');
Route::resource('bookingtypes', 'BookingTypeController');
Route::resource('querystatuses', 'QueryStatusController');
Route::resource('users', 'UserController');
Route::get('/query/create', 'QueryController@create_home')->name('query_create_home');
Route::get('/query/create-with-customer', 'QueryController@create_with_customer')->name('query_create_with_customer');
Route::get('/query/create-without-customer', 'QueryController@create_without_customer')->name('query_create_without_customer');
Route::post('/query/save', 'QueryController@save_without_client')->name('save_query_without_client');

Route::get('/queries', 'QueryController@getIndex')->name('queries');
Route::get('/queries/data', 'QueryController@anyData');



Auth::routes();




