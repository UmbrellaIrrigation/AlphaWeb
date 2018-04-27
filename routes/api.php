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

Route::post('apiRegister', 'Auth\RegisterController@apiRegister');
Route::post('apiLogin', 'Auth\LoginController@apiLogin');
Route::post('apiLogout', 'Auth\LoginController@apiLogout');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function() {
	Route::get('/treeData', 'UserController@index')->name('api.users.tree');
});


Route::group(['middleware' => 'auth:api'], function() {
	Route::get('valves', 'API\ValveController@index');
	Route::get('valves/{valve}', 'API\ValveController@show');
	Route::post('valves', 'API\ValveController@store');
	Route::put('valves/{valve}', 'API\ValveController@store');
	Route::post('valves/{valve}', 'API\ValveController@destroy');

	Route::get('valves/group', 'API\ValveGroupController@index');
	Route::get('valves/group/show/{valvegroup}', 'API\ValveGroupController@show');
	Route::post('valves/group', 'API\ValveGroupController@store');
	Route::put('valves/group/{valvegroup}', 'API\ValveGroupController@store');
	Route::post('valves/group/{valvegroup}', 'API\ValveGroupController@destroy');

	Route::get('test1', 'API\TestController@index1');
	Route::get('test2', 'API\TestController@index2');
});
