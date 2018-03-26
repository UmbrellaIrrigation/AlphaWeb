<?php

use Illuminate\Http\Request;
use App\Valve;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('valves', 'API\ValveController@index');
Route::get('valves/{valve}', 'API\ValveController@show');
Route::post('valves', 'API\ValveController@store');
Route::put('valves/{valve}', 'API\ValveController@store');
Route::post('valves/{valve}', 'API\ValveController@destroy');
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
