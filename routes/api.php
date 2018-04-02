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

Route::post('login', 'Api\Auth\LoginController@login');
Route::post('register', 'Api\Auth\RegisterController@register');

Route::middleware(['auth:api'])->group(function () {
    $noViews = ['except'=>['edit', 'create']];
    $updateOnly = ['only'=>['index', 'show', 'update']];

    Route::resource('categories', 'Api\CategoryController', $noViews);
    Route::resource('circles', 'Api\CircleController', $noViews);
    Route::resource('messages', 'Api\MessageController', $noViews);
    Route::resource('profiles', 'Api\UserProfileController', $updateOnly);
    Route::get('current_profile', 'Api\UserProfileController@currentProfile')->name('profiles.current_profile');
});
