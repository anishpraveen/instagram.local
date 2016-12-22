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
    return redirect('/home');
});

Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/admin/user', 'AdminController@user');
Route::get('/admin/user/{id?}', 'AdminController@getUserList');
Route::get('/admin/post', 'AdminController@post');
Route::get('/admin/post/{id?}', 'AdminController@getPostList');
Route::post('/admin/toggleRole', 'AdminController@toggleRole');

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');
Route::get('/profile/{id}', 'HomeController@viewProfile');
Route::get('/profile/{id}/followers', 'HomeController@followers');
Route::get('/profile/{id}/following', 'HomeController@following');
Route::get('/favourites', 'HomeController@favourites');
Route::get('/settings', 'HomeController@settings');
Route::get('/search/{id?}', 'HomeController@search');

Route::resource('posts', 'PostsController');
Route::get('/posts', 'PostsController@get');
Route::post('/posts/savePost', 'PostsController@savePostEdits');

Route::get('/edit/{id}', 'PostsController@viewEditPost');
Route::get('/delete/{id}', 'PostsController@deletePost');
Route::post('/post/delete', 'PostsController@delete');

Route::get('/follow/{id}', 'FollowController@follow');
Route::get('/follow/{id}/unfollow', 'FollowController@unfollow');

Route::get('/like/{id}', 'FavouriteController@like');
Route::get('/like/{id}/unlike', 'FavouriteController@unlike');

Route::post('/user/save', 'UserController@save');
Route::post('/user/location', 'UserController@storeLocation');
Route::post('/user/email', 'UserController@checkEmail');
Route::post('/user/password', 'UserController@checkPassword');
Route::post('/user/delete', 'UserController@delete');
Route::post('/user/block', 'UserController@block');
Route::post('/user/unblock', 'UserController@unblock');

$social = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => 'social.redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => 'social.handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 

/*Page not found*/
Route::any('{catchall}', function() {
    return view('errors.404');
})->where('catchall', '.*');