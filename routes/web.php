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

Route::get('/login','AuthController@login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::post('/search','BookingController@search');
Route::get('/buy/{id}/{pasenger}','BookingController@buy');
Route::get('/confirmplane/{id}/{passenger}','BookingController@confirmplane');
Route::get('/passenger/{id}/{passenger}','BookingController@passenger');
Route::post('/contactinfo/{id}/{passenger}','BookingController@contactinfo');
Route::get('/seat/{id}/{passenger}','BookingController@seat');
Route::post('/seat/{id}/{passenger}/book','BookingController@bookseat');
