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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);



Route::get('/search/{user_query}', [
    'uses' => 'PostController@searchPost',
    'as' => 'search'
]);

//User
Route::get('/user/{user_id}', [
    'uses' => 'UserController@getUserProfile',
    'as' => 'profile'
]);


Route::get('editprofile', function () {
    return view('editprofile', ['pseudo' => 'John Doe']);
});


//Post
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


//Notifications

Route::get('/getNotifications', 'NotificationController@getNotifications');

Route::post('deleteNotification', 'NotificationController@deleteNotification');

