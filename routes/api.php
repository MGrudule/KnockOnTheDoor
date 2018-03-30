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

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CircleController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserProfileController;

Route::post('register', 'Auth\RegisterController@register');
Route::post('login',    'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function () {
    $noViews    = ["except"=>['edit', 'create']];
    $updateOnly = ["except"=>['edit', 'create', "store", "destroy"]];

    Route::resource('categories', 'Api\CategoryController', $noViews);
    Route::resource('circles',    'Api\CircleController', $noViews);
    Route::resource('messages',   'Api\MessageController', $noViews);
    Route::resource('profiles',   'Api\UserProfileController', $updateOnly);
    Route::get('current_profile', 'Api\UserProfileController@currentProfile')->name('profiles.current_profile');
});
