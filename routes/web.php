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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function (){
    Route::get('post','PostController@index')->name('post.index');
    Route::post('post','PostController@store')->name('post.store');
    Route::get('post/create','PostController@create')->name('post.create');
    Route::get('post/{id}','PostController@show')->name('post.show');
    Route::put('post/{id}','PostController@update')->name('post.update');
    Route::delete('post/{id}','PostController@destroy')->name('post.destroy');
    Route::get('post/{id}/edit','PostController@edit')->name('post.edit');
});

Route::get('image/create','ImageController@create')->name('image.create');
Route::post('image','ImageController@store')->name('image.store');
Route::get('image','ImageController@index')->name('image.index');
Route::get('image/{id}','ImageController@show')->name('image.show');
Route::delete('image/{id}','ImageController@destroy')->name('image.destroy');
Route::delete('image/{id}','ImageController@destroy')->name('image.destroy');

Route::get('user/create','UserController@create')->name('user.create');
Route::post('user','UserController@store')->name('user.store');