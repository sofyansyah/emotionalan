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

Route::get('/', 'HomeController@register');
Auth::routes();
//route socialita facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['login']], function () {

    Route::get('/home', 'HomeController@index');
    Route::resource('comment', 'CommentsController');
    Route::post('comment/{id}/edit', 'CommentsController@update');
    Route::resource('emoticon', 'EmoticonsController');
    // Route::get('/', 'EmoticonsController@home');
    Route::resource('emotion', 'EmotionsController');
    Route::get('profile/{username}', 'ProfileController@profile');
    Route::resource('home/', 'EmotionsController');
    Route::resource('posts', 'PostsController');
    Route::get('/search/{query?}', ['as' => 'search', 'uses' => 'SearchController@search']);
    Route::get('profile/{username}/edit', 'ProfileController@edit_profile');
    Route::post('profile/{id}/edit', 'ProfileController@post_profile');
    Route::get('follow/{username}', 'ProfileController@follow');
    Route::get('unfollow/{username}', 'ProfileController@unfollow');

});
