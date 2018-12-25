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


Auth::routes();
Route::any('/register','HomeController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index');
    Route::resource('news', 'Admin\\NewsController');
    Route::resource('category', 'Admin\\CategoryController');
    Route::resource('notification', 'Admin\\NotificationController');
    Route::resource('reader', 'Admin\\ReaderController');
    Route::post('reader/update_pass/{id}', 'Admin\\ReaderController@update_pass')->name('reader.update_pass');
    Route::resource('user', 'Admin\\UserController');
    Route::post('user/update_pass/{id}', 'Admin\\UserController@update_pass')->name('user.update_pass');
});


