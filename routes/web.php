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

//Route::get('/')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('article/{article}', 'ArticleController@show')->name('article.show');
Route::get('article/like/{article}', 'ArticleController@like')->name('article.like')->middleware('throttle:10');
Route::get('category/{category}', 'CategoryController@show')->name('category.show');
Route::get('tag/{tag}', 'TagController@show')->name('tag.show');
Route::resource('reply', 'ReplyController', ['only' => ['destroy']]);
Route::post('reply', 'ReplyController@store')->name('reply.store')->middleware('throttle:3');