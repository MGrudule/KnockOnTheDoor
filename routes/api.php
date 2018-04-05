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
// Route::post('register', 'Api\Auth\RegisterController@register');

Route::middleware(['auth:api'])->group(function () {
    Route::apiResources([
        '/categories' => 'Api\CategoryController',
        '/circles' => 'Api\CircleController',
        '/comments' => 'Api\CommentController',
        '/messages' => 'Api\MessageController',
    ]);

    Route::apiResource('/profiles', 'Api\UserProfileController')
        ->only(['index', 'show', 'update']);
    Route::get('/current_profile', 'Api\UserProfileController@currentProfile')
        ->name('profiles.current_profile');
    Route::get('/messages/{message}/comments', 'Api\MessageController@comments');

    Route::post('/profile/image', 'Api\UserProfileController@updateImage');
});
