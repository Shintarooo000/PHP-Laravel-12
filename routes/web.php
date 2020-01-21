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

Route::group(['prefix' => 'admin'],function(){
   Route::get('news/create','Admin\NewsController@add')->middleware('auth');
   Route::get('/profile/create','Admin\ProfileController@add')->middleware('auth');
   Route::get('/profile/edit','Admin\ProfileController@edit')->middleware('auth');
});

//課題3
Route::get('/XXX','Admin\AAAController@bbb');

//課題4
Route::get('/profile/create','Admin\ProfileController@add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::get('new/create', 'Admin\NewsController@add');
    Route::post('news/create','Admin\NewsController@create');
    Route::post('profile/create', 'Admin\ProfileController@crate');
});