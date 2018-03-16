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

// Route::middleware('auth:api')->get('user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', 'Auth\Api\RegisterController@register');
// Route::post('login', 'Auth\Api\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

// Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
Route::group(['middleware' => 'auth:api'], function () {
    // Route::resource('users', 'UserController');
    Route::get('users', 'UserController@index');
    Route::get('user', 'UserController@profile');
});
