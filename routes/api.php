<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('device/info/{id}', array('middleware' => 'cors', 'uses' => 'DeviceApiController@getDeviceOnId'));

Route::post('device/monitoring', array('middleware' => 'cors', 'uses' => 'DeviceApiController@postDeviceMonitoring'));
