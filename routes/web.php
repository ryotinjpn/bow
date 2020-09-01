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
Route::get('/posts', 'PostsController@index');
Route::get('/posts/{id}','PostsController@show');
Route::post('/posts', 'PostsController@store');

Route::get('/users/index', 'UsersController@index');
Route::get('/users/edit', 'UsersController@edit')->middleware('auth');
Route::post('/users/edit', 'UsersController@update')->middleware('auth');
Route::get('/users/{id}', 'UsersController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::post('/posts/{post}/likes', 'LikesController@store');
Route::post('/posts/{post}/likes/{like}', 'LikesController@destroy');