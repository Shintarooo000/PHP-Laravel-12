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

//課題3
Route::get('/XXX','Admin\AAAController@bbb');

//課題4
Route::get('/profile/create','Admin\ProfileController@add');

Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    

Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create','Admin\NewsController@create');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth'); // 追記
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');//追記
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');//
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth'); // 追記
    Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth'); // 追記
    Route::get('profile', 'Admin\ProfileController@index')->middleware('auth'); // 追記
    Route::get('profile/delete', 'Admin\ProfileController@delete')->middleware('auth');
});

Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');