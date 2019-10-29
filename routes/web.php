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

    Route::get('/', 'HomePageController@index')->name('welcome')->middleware('guest');
    Route::get('/register', 'RegistrationController@create')->middleware('guest');
    Route::post('/register', 'RegistrationController@store')->name('userHome');;
    Route::get('/login', 'SessionsController@create')->name('login');
    Route::post('/login', 'SessionsController@store');
    Route::get('/admin/login', 'AdminController@create');
    Route::post('/admin/login', 'AdminController@store');
    Route::get('/dlogin', 'DoctorController@create');
    Route::post('/dlogin', 'DoctorController@store');
    Route::get('/logout', 'SessionsController@destroy');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/add_doc', 'AdminController@createDoc');
        Route::post('/admin/add_doc', 'AdminController@storeDoc');
        Route::get('/admin/show_doc', 'AdminController@showDoc');
        Route::post('/admin/delete_doc', 'AdminController@deleteDoc');
        Route::post('/admin/edit_doc', 'AdminController@editDoc');
        Route::patch('/admin/save_doc', 'AdminController@saveEditedDoc');
        });
   
    Route::middleware(['user'])->group(function () {
        Route::get('/edit_user', 'UserController@editUser');
        Route::patch('/edit_user', 'UserController@storeUser');
        Route::post('/search', 'Controller@search');
        Route::post('/schedule', 'Controller@schedule');
        Route::get('/scheduled', 'Controller@scheduled');
        Route::post('/scheduled', 'Controller@scheduledApp');
        Route::post('/scheduled_appointment', 'Controller@scheduledAppStore');
        Route::get('/profile', 'UserController@show')->name('profile');
        Route::get('/home', 'Controller@index');
        Route::post('/appointment_delete', 'UserController@appointmentDelete');
        });

    Route::middleware(['doctor'])->group(function () {
        Route::get('/edit_doctor', 'DoctorController@editDoc');
        Route::patch('/edit_doctor', 'DoctorController@storeDoc');
        Route::get('/service_add', 'DoctorController@add');
        Route::post('/service_add', 'DoctorController@save');
        Route::post('/service_delete', 'DoctorController@delete');
        Route::post('/appointment_delete_doc', 'DoctorController@appointmentDeleteDoc');
        Route::get('/diagnose_add', 'DoctorController@addDiagnose');
        Route::post('/diagnose_add', 'DoctorController@saveDiagnose');
        Route::get('/doctor/home', 'DoctorController@getHome')->name('docHome');;
        });



















