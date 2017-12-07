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

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/users','UserController@main')->name('users')->middleware('admin');
Route::get('/users/index','UserController@index')->name('users.index')->middleware('admin');
Route::get('/users/show/user/{user}', 'UserController@show')->middleware('admin');
Route::post('/users/store', 'UserController@store')->name('users.store')->middleware('admin');
Route::post('/users/group/store', 'UserGroupController@store')->name('usergroup.store')->middleware('admin');
Route::get('/valves', 'ValveController@main')->name('valves')->middleware('admin');
