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

use App\Http\Controllers\Resource\CategoryController;
use App\Http\Controllers\Resource\CircleController;
use App\Http\Controllers\Resource\MessageController;
use App\Http\Controllers\Resource\UserProfileController;

Route::post('register', 'Auth\RegisterController@register');
Route::post('login',    'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function () {
    $noViews    = ["except"=>['edit', 'create']];
    $updateOnly = ["except"=>['edit', 'create', "store", "destroy"]];

    Route::resource('categories', 'Resource\CategoryController', $noViews);
    Route::resource('circles',    'Resource\CircleController', $noViews);
    Route::resource('messages',   'Resource\MessageController', $noViews);
    Route::resource('profiles',   'Resource\UserProfileController', $updateOnly);
    Route::get('current_profile', 'Resource\UserProfileController@currentProfile')->name('profiles.current_profile');
});
