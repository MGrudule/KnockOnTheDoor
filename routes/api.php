<?php

use App\Circle;
use App\Message;
use App\User;
use App\Http\Resources\CircleResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\ProfileResource;

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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('current_profile', function () {
        return new ProfileResource(Auth::user());
    });

    Route::get('profiles', function () {
        return ProfileResource::collection(User::all());
    });

    Route::get('circles', function () {
        return CircleResource::collection(Circle::all());
    });

    Route::get('messages/{message}', function (Message $message) {
        return new MessageResource($message);
    });

    Route::get('messages', function () {
        return MessageResource::collection(Message::all());
    });
});
