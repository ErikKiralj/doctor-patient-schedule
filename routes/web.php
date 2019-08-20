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

Auth::routes();

Route::get('/', 'Controller@index')->middleware('auth');

Route::post('/search', 'Controller@search');

Route::post('/schedule', 'Controller@schedule');

Route::get('/scheduled', 'Controller@scheduled');

Route::post('/scheduled', 'Controller@scheduledApp');


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/dlogin', 'DoctorController@create');

Route::post('/dlogin', 'DoctorController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/profile', 'UserController@show');

Route::get('/service', 'DoctorController@add');

Route::post('/service', 'DoctorController@save');














