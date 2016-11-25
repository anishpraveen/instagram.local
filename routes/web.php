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
Route::get('/profile/{id}', 'HomeController@viewProfile');
Route::get('/favourites', 'HomeController@favourites');
Route::get('/settings', 'HomeController@settings');
Route::get('/search/{id}', 'HomeController@search');

Route::get('/crop', function () {
    return view('crop');
});

Route::resource('posts', 'PostsController');
Route::get('/posts', 'PostsController@get');

Route::get('/follow/{id}', 'FollowController@follow');
Route::get('/follow/{id}/unfollow', 'FollowController@unfollow');

Route::get('/like/{id}', 'FavouriteController@like');
Route::get('/like/{id}/unlike', 'FavouriteController@unlike');

Route::post('/user/save', 'UserController@save');
Route::post('/user/location', 'UserController@storeLocation');

$social = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => 'social.redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => 'social.handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

// route for testing purpose only
Route::get('/test', function(){
    //
    if(App\Follower::where('follower_id','=',Auth::user()->id)->where('user_id','=','5')->count())
        dd('folol');
    else
        dd('no fol');
});