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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PostsController@index');

// 投稿詳細追加
Route::resource('posts', 'PostsController', ['only' => ['show']]);

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show', 'destroy']]);
    Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy']]);
    
    // 多対多ユーザ部分追加
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('likes', 'UsersController@likes')->name('users.likes');
        
    });
    
    // 多対多お気に入り部分追加
    Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('like', 'LikesController@store')->name('likes.like');
        Route::delete('unlike', 'LikesController@destroy')->name('likes.unlike');
    });
});