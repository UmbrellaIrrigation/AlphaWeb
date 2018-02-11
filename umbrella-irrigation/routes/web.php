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
Route::get('/users/editName/user/{user}', 'UserController@editName');
Route::get('/users/editDescription/user/{user}', 'UserController@editDescription');
Route::get('/users/editPermission/user/{user}', 'UserController@editPermission');

Route::get('/users/show/group/{usergroup}', 'UserGroupController@show');
Route::get('/users/delete/{user}','UserController@destroy');
Route::post('/users/store', 'UserController@store')->name('users.store');
Route::post('/users/group/store', 'UserGroupController@store')->name('usergroup.store');
Route::get('/users/group/delete/{group}', 'UserGroupController@destroy');
Route::get('/valves', 'ValveController@main')->name('valves')->middleware('admin');
Route::get('/valves/index','ValveController@index')->name('valves.index')->middleware('admin');

Route::get('/account/{user}/settings', 'AccountSettingsController@index');

// Route::get('/accountsettings', 'AccountSettingsController@show');