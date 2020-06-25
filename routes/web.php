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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/device/onboarding', 'DeviceController@onboarding')->name('device-onboarding');

Route::post('/device/onboarding', 'DeviceController@addDevice')->name('add-device');

Route::post('/device/update', 'DeviceController@editDevice')->name('edit-device');

Route::get('/device/list', 'DeviceController@index')->name('device-manage');

Route::get('/device/getDevice', 'DeviceController@getDevice')->name('get-device');
Route::get('/device/getAllDevices', 'DeviceController@getAllDevices')->name('get-all-devices');
Route::get('/device/editDeviceStatus', 'DeviceController@editDeviceStatus')->name('edit-device-status');
Route::get('/device/configuration/{id}', 'DeviceController@configuration')->name('configuration');



