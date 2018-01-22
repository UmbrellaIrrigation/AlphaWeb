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

Route::get('/users/show', function() {
    return view('users.show');
});

Route::get('/valves', function () {
    return view('valves.main');
});

Route::get('/valves/index', function () {
    return view('valves.index');
});

Route::get('/valves/show', function() {
    return view('valves.show');
});