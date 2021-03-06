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

Route::get('/', 'HomeController@index')->name('home');

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
Route::get('/query/create-with-customer/{customer_id}', 'QueryController@create_with_customer')->name('query_create_with_customer');

Route::post('/query/save', 'QueryController@save')->name('save_query');

Route::get('/queries', 'QueryController@getIndex')->name('queries');
Route::get('/queries/data', 'QueryController@anyData');
Route::get('/queries/delete/{id}', 'QueryController@destroy');
Route::get('/queries/edit/{id}', 'QueryController@edit')->name('queries_edit');
Route::post('/queries/update', 'QueryController@update')->name('queries_update');
Route::get('/queries/{id}', 'QueryController@view')->name('queries_view');
Route::post('/save/remark', 'QueryController@saveRemark')->name('save_remark');

Route::get('/reports', 'ReportController@index')->name('reports.index');
Route::get('/reports-generate-queries', 'ReportController@exportQueries')->name('reports.generate.queries');
Route::get('/reports-generate-customers', 'ReportController@exportCustomers')->name('reports.generate.customers');

Route::get('/logo', 'LogoController@index')->name('logo.index');
Route::post('/logo', 'LogoController@save')->name('logo.save');

Route::get('/queries/filter/{value}', 'QueryController@getIndex')->name('queries.general_search');
Route::post('/find/query', 'QueryController@find')->name('find_query');

Route::get('/notifications', 'NotificationController@index')->name('notifications');
Route::post('/notifications/save', 'NotificationController@save')->name('save_notification');
