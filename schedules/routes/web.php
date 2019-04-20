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
    Route::get('/schedule/create','ScheduleController@showCreateForm')->name('schedules.create');
    Route::post('/schedule/create','ScheduleController@create');
    Route::get('/schedules/{id}/events', 'ScheduleController@detail')->name('schedules.detail');
});
Auth::routes();
