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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');
Route::get('/favourites', 'HomeController@favourites');
Route::get('/settings', 'HomeController@settings');
Route::post('/search', 'HomeController@search');

Route::resource('posts', 'PostsController');
Route::get('/posts', 'PostsController@get');

Route::get('/follow/{id}', 'FollowController@follow');
Route::get('/follow', 'FollowController@index');
Route::get('/follow/{id}/unfollow', 'FollowController@unfollow');


$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);