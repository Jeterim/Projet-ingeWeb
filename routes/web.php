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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('/timeline/{date}', [
    'uses' => 'PostController@searchDate',
    'as' => 'timeline'
]);

Route::post('/search/', [
    'uses' => 'PostController@searchPost',
    'as' => 'search'
]);

//User
Route::get('/user/{user_id}', [
    'uses' => 'UserController@getUserAndPost',
    'as' => 'profile'
]);


Route::get('/user/edit/{user_id}', [
    'uses' => 'UserController@getEditProfile',
    'as' => 'profile'
]);

Route::get('/user/delete/{user_id}', [
    'uses' => 'PostController@deleteProfile',
    'as' => 'profile'
]);

//Post
Route::post('/user/edit/{user_id}', [
    'uses' => 'PostController@editProfile',
    'as' => 'profile.edit'
]);

Route::get('/buy/{post_id}',[
    'uses' => 'PostController@buy',
    'as' => 'post.buy'
]);

Route::get('/delete/{post_id}',[
    'uses' => 'PostController@deletePost',
    'as' => 'post.delete'
]);

Route::post('/createpost', [
    'uses' => 'PostController@createPost',
    'as' => 'post.create'
]);

Route::get('/pages/', [
    'uses' => 'PostController@getPostPage',
    'as' => 'post.page'
]);

Route::get('/post/{post_id}', [
    'uses' => 'PostController@getPostInfo',
    'as' => 'post.view'
]);

Route::post('/post/{post_id}/comment', [
    'uses' => 'PostController@createComment',
    'as' => 'post.comment'
]);

Route::get('/comment/delete/{comment_id}/', [
    'uses' => 'PostController@deleteComment',
    'as' => 'post.comment.delete'
]);

Route::get('/post/delete/{post_id}', [
    'uses' => 'PostController@deleteUserPost',
    'as' => 'post.udelete'
]);

Route::post('/post/edit/{post_id}', [
    'uses' => 'PostController@editPost',
    'as' => 'post.edit'
]);

Route::get('/post/edit/{post_id}', [
    'uses' => 'PostController@geteditPost',
    'as' => 'post.getedit'
]);

Route::post('/user/editprofile/{post_id}', [
    'uses' => 'PostController@editPassword',
    'as' => 'profile.editpassword'
]);

Route::post('/editedprofile/{user_id}', 'UserController@editProfile');
Route::post('/vote', 'VoteController@manager');

//Notifications

Route::get('/getNotifications', 'NotificationController@getNotifications');

Route::post('deleteNotification', 'NotificationController@deleteNotification');

