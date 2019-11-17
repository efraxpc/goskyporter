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

Route::get('/', 'HomeController@index');

Route::resource('airlines', 'AirlineController');
Route::resource('airports', 'AirportController');
Route::resource('visastatus', 'VisaStatusController');
Route::resource('bookingsources', 'BookingSourceController');
Route::resource('querytypes', 'QueryTypeController');
Route::resource('bookingtypes', 'BookingTypeController');
Route::resource('querystatuses', 'QueryStatusController');
Route::get('/customer/create', 'QueryController@create_home')->name('customer_create_home');
Route::get('/customer/create-with-customer', 'QueryController@create_with_customer')->name('customer_create_with_customer');
Route::get('/customer/create-without-customer', 'QueryController@create_without_customer')->name('customer_create_without_customer');
Route::post('/customer/save', 'QueryController@save')->name('save_query');

