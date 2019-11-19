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
Auth::routes();

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
Route::get('/query/create-without-customer', 'QueryController@create_without_customer')->name('query_create_without_customer');
Route::get('/query/create-with-customer/list', 'QueryController@create_with_customer_index')->name('query_create_with_customer_index');
Route::get('/query/create-with-customer/list/data', 'QueryController@anyData');

Route::post('/query/save', 'QueryController@save_without_client')->name('save_query_without_client');

Route::get('/queries', 'QueryController@getIndex')->name('queries');
Route::get('/queries/data', 'QueryController@anyData');
Route::get('/queries/delete/{id}', 'QueryController@destroy');
Route::get('/queries/edit/{id}', 'QueryController@edit');

