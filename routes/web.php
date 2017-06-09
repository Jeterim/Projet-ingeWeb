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

Route::get('/home', 'HomeController@index')->name('home');

//User

Route::get('/user/{user_id}', [
    'uses' => 'UserController@getUserAndPostProfile',
    'as' => 'profile'
]);


Route::get('/editprofile/{user_id}', [
    'uses' => 'UserController@getUserProfile',
    'as' => 'profile'
]);

//Post
Route::post('/createpost', [
    'uses' => 'PostController@createPost',
    'as' => 'post.create'
]);
