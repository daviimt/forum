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

Route::get('/', 'ForumController@index');
Route::get('/forums/{forum}','ForumController@show');
Route::post('/forums', 'ForumController@store');

Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');
Route::delete('/posts/{post}', 'PostController@destroy');

Route::post('/replies', 'ReplyController@store');
Route::delete('/replies/{reply}', 'ReplyController@destroy')->name('replies.delete');

Auth::routes();