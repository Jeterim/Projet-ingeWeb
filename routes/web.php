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
    'uses' => 'UserController@getUserProfile',
    'as' => 'profile'
]);


Route::get('editprofile', function () {
    return view('editprofile', ['pseudo' => 'John Doe']);
});

//Post
Route::post('/createpost', [
    'uses' => 'PostController@createPost',
    'as' => 'post.create'
]);