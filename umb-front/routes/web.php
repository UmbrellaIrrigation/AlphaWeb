<?php

/*
|--------------------------------------------------------------------------
|   Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/users', function () {
    return view('users.main');
});

Route::get('/users/index', function () {
    return view('users.index');
});

Route::get('/users/create', function() {
    return view('users.create');
});

Route::get('/users/group', function() {
    return view('users.group');
});

Route::get('/valves/create', function() {
    return view('valves.create');
});

Route::get('/valves/group', function() {
    return view('valves.group');
});
