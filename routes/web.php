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

Auth::routes();

Route::middleware(['auth:web'])->group(function() {
    $updateOnly = ['only'=>['index', 'show', 'edit', 'update']];

    Route::get('/home', 'Web\HomeController@index')->name('home');
    Route::resource('/categories', 'Web\CategoryController');
    Route::resource('/circles', 'Web\CircleController');
    Route::resource('/mails', 'Web\MailController', $updateOnly);
    Route::resource('/users', 'Web\UserController');

    Route::get('/mail/welcome', function () {
        return new App\Mail\Welcome(Auth::user(), Auth::user());
    })->name('mail.welcome');

    Route::get('/mail/welcome/send',
        'Web\MailController@sendTestMail')->name('mail.welcome.send');
});
