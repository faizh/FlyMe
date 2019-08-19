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

Route::get('/login','AuthController@login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::get('/yourbooking','BookingController@yourbooking');
Route::post('/booking/search','BookingController@search');
Route::post('/booking/choose','BookingController@choose');
Route::post('/booking/passenger','BookingController@passenger');
Route::post('/booking/seat','BookingController@seat');
// Route::get('/seat/{id}/{passenger}','BookingController@seat');
Route::post('/booking/payment','BookingController@payment');
Route::post('/booking/complete','BookingController@complete');

Route::post('/bookinginfo','BookingController@check');

Route::get('/admin','AdminController@index');
Route::get('/admin/user','AdminController@user');
Route::get('/admin/user/edit/{id}','AdminController@edit');
Route::post('/admin/user/update','AdminController@update');
Route::get('/admin/user/delete/{id}','AdminController@delete');
Route::get('/admin/rute','AdminController@rute');
Route::get('/admin/rute/create','AdminController@createrute');
Route::post('/admin/rute/postcreate','AdminController@postcreaterute');
Route::get('/admin/rute/edit/{id}','AdminController@editrute');
Route::post('/admin/rute/update','AdminController@updaterute');