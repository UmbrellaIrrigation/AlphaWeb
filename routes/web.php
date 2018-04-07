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

use App\UserGroup;
use App\UserGroupTree;

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::prefix('users')->group(function() {
    Route::get('/','UserController@main')->name('users');
    Route::get('index','UserController@index')->name('users.index');
    
    Route::get('/treeData', function() {
        $groupTree = new UserGroupTree();
        $jsonTree = $groupTree->createTree(UserGroup::getRootGroups());

        return $jsonTree;
    });

    Route::get('user/show/{user}', 'UserController@show');
    Route::get('user/editName/{user}', 'UserController@editName');
    Route::get('user/editDescription/{user}', 'UserController@editDescription');
    Route::get('user/editPermission/{user}', 'UserController@editPermission');
    Route::get('user/delete/{user}','UserController@destroy');
    Route::post('user/store', 'UserController@store')->name('users.store');

    Route::get('group/show/{usergroup}', 'UserGroupController@show');
    Route::get('group/delete/{usergroup}', 'UserGroupController@destroy');
    Route::get('group/deleteWithChildren/{usergroup}','UserGroupController@destroyWithChildren');
    Route::post('group/store', 'UserGroupController@store')->name('usergroup.store');
});

Route::prefix('valves')->group(function() {
    Route::get('/', 'ValveController@main')->name('valves')->middleware('admin');
    Route::get('index','ValveController@index')->name('valves.index')->middleware('admin');
    Route::get('valve/show/{valve}', 'ValveController@show');
    Route::get('valve/delete/{valve}', 'ValveController@destroy');
    Route::post('valve/store', 'ValveController@store')->name('valves.store');

    Route::get('group/show/{valvegroup}', 'ValveGroupController@show');
    Route::get('group/delete/{valvegroup}', 'ValveGroupController@destroy');
    Route::post('group/store', 'ValveGroupController@store')->name('valvegroup.store');
});

Route::get('/settings', 'AccountSettingsController@index')->name('settings.home');
Route::get('/getsettings', 'AccountSettingsController@getIndex');
Route::post('/settings/name', 'AccountSettingsController@editName')->name('settings.name');
Route::post('/settings/description', 'AccountSettingsController@editDescription')->name('settings.description');
Route::post('/settings/email', 'AccountSettingsController@editEmail')->name('settings.email');
// Route::post('/settings/password', 'AccountSettingsController@editPassword');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
