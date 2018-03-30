<?php

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

use App\Http\Controllers\Resource\CircleController;
use App\Http\Controllers\Resource\MessageController;
use App\Http\Controllers\Resource\ProfileController;
use App\Http\Resources\ProfileResource;

Route::post('register', 'Auth\RegisterController@register');
Route::post('login',    'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('current_profile', function () {
        return new ProfileResource(Auth::user());
    });
    Route::resource('circles',    'Resource\CircleController');
    Route::resource('messages',   'Resource\MessageController');
    Route::resource('profiles',   'Resource\ProfileController');
});
