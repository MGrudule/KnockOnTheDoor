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

Route::get('/', function() {
    return view('home');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth:web'])->group(function() {
    Route::get('/home', 'Web\HomeController@index')->name('home');
    Route::resource('/categories', 'Web\CategoryController');
    Route::resource('/circles', 'Web\CircleController');
    // Route::resource('/comments', 'Web\CommentController');
    Route::resource('/mails', 'Web\MailController')
        ->only('index', 'show', 'update', 'edit');
    // Route::resource('/messages', 'Web\MessageController');
    Route::resource('/users', 'Web\UserController');
    Route::get('/users/{user}/image', 'Web\UserController@editImage')->name('users.edit.image');
    Route::put('/users/{user}/image', 'Web\UserController@updateImage')->name('users.update.image');

    Route::get('/mail/welcome', function () {
        return new App\Mail\Welcome(Auth::user(), Auth::user());
    })->name('mail.welcome');

    Route::get('/mail/welcome/send',
        'Web\MailController@sendTestMail')->name('mail.welcome.send');
});
