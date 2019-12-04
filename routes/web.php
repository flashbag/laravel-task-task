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

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'admin'
], function() {
	Route::resource('posts', 'PostController');
});

Route::get('/pixabay-search', 'PixabayController@searchImage')->name('search-image');

Route::get('/', 'HomeController@index')->name('home');
