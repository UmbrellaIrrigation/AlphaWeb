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
Route::get('/users','UserController@main')->name('users');
Route::get('/users/index','UserController@index')->name('users.index');
Route::get('/users/show/user/{user}', 'UserController@show');
Route::get('/users/show/group/{group}', 'UserGroupController@show');
Route::post('/users/store', 'UserController@store')->name('users.store');
Route::post('/users/group/store', 'UserGroupController@store')->name('usergroup.store');
Route::get('/valves', 'ValveController@main')->name('valves')->middleware('admin');
Route::get('/valves/index','ValveController@index')->name('valves.index')->middleware('admin');
Route::get('/users/delete/{user}','UserController@destroy');
