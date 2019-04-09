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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/schedules/{id}', 'ScheduleController@index')->name('schedules.index');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/schedules/create','ScheduleController@showCreateForm')->name('schedules.create');
    Route::post('/schedules/create','ScheduleController@create');
});
Auth::routes();
