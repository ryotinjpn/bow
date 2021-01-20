<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('posts',      'PostsController@index');
Route::get('posts/{id}', 'PostsController@show');
Route::post('posts',     'PostsController@store');

Route::get('users',       'UsersController@index');
Route::get('users/edit',  'UsersController@edit')->middleware('auth');
Route::get('users/{id}',  'UsersController@show');
Route::post('users/edit', 'UsersController@update')->middleware('auth');

Route::post('posts/{post}/comments', 'CommentsController@store');

Route::get('posts/like/{id}',   'LikesController@like')->name('posts.like');
Route::get('posts/unlike/{id}', 'LikesController@unlike')->name('posts.unlike');

Route::get('posts/favorite/{id}',   'favoritesController@favorite')->name('posts.favorite');
Route::get('posts/unfavorite/{id}', 'favoritesController@unfavorite')->name('posts.unfavorite');