<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('comment', 'CommentsController');
Route::resource('emoticon', 'EmoticonsController');
Route::resource('emotion', 'EmotionsController');
Route::get('profile/{username}', 'ProfileController@profile');
Route::resource('home/', 'EmotionsController');
Route::resource('posts', 'PostsController');
Route::get('profile/{username}/edit', 'ProfileController@edit_profile');
Route::post('profile/{id}/edit', 'ProfileController@post_profile');
