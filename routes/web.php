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

Route::get('/','WebController@index');
Route::get('/about','WebController@about');
Route::get('/packages','WebController@packages');
Route::get('/insurance','WebController@insurance');
Route::get('/contact','WebController@contact');

Route::get('/signup','UserController@signup');
Route::post('/postsignup','UserController@postsignup');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::post('/booking/search','BookingController@search');

Route::group(['middleware'=>['auth','checkLevel:0,1']],function(){
	Route::post('/booking/choose','BookingController@choose');
	Route::post('/booking/passenger','BookingController@passenger');
	Route::post('/booking/seat','BookingController@seat');
	Route::post('/booking/payment','BookingController@payment');
	Route::post('/booking/complete','BookingController@complete');
	Route::get('/yourbooking','BookingController@yourbooking');
	Route::post('/bookinginfo','BookingController@check');
	Route::post('/boardingpass','BookingController@boardingpass');
});

Route::group(['middleware'=>['auth','checkLevel:1']],function(){
	Route::get('/admin','AdminController@index');
	Route::get('/admin/user','AdminController@user');
	Route::get('/admin/user/create','AdminController@createuser');
	Route::post('/admin/user/postcreate','AdminController@postcreateuser');
	Route::get('/admin/user/edit/{id}','AdminController@edituser');
	Route::post('/admin/user/update','AdminController@updateuser');
	Route::get('/admin/user/delete/{id}','AdminController@deleteuser');
	Route::get('/admin/rute','AdminController@rute');
	Route::get('/admin/rute/create','AdminController@createrute');
	Route::post('/admin/rute/postcreate','AdminController@postcreaterute');
	Route::get('/admin/rute/edit/{id}','AdminController@editrute');
	Route::post('/admin/rute/update','AdminController@updaterute');
	Route::get('/admin/rute/delete/{id}','AdminController@deleterute');
	Route::get('/admin/customer','AdminController@customer');
	Route::get('/admin/customer/edit/{id}','AdminController@editcustomer');
	Route::post('/admin/customer/update','AdminController@updatecustomer');
	Route::get('/admin/customer/delete/{id}','AdminController@deletecustomer');
	Route::get('/admin/reservation','AdminController@reservation');
	Route::get('/admin/reservation/approve/{id}','AdminController@approvereservation');
	Route::get('/admin/reservation/unapprove/{id}','AdminController@unapprovereservation');
	Route::get('/admin/plane','AdminController@plane');
	Route::get('/admin/plane/create','AdminController@createplane');
	Route::post('/admin/plane/postcreate','AdminController@postcreateplane');
	Route::get('/admin/plane/edit/{id}','AdminController@editplane');
	Route::post('/admin/plane/update','AdminController@updateplane');
	Route::get('/admin/plane/delete/{id}','AdminController@deleteplane');
});