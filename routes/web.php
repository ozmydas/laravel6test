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

// tes
Route::resource('example', 'ExampleController');

// upload gambar
Route::get('upload', ['as' => 'upload', 'uses' => 'FileUploadController@index']);
Route::post('upload', ['as' => 'upload.store', 'uses' => 'FileUploadController@store']);

// auto complete
Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');

// form validation
Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/create', 'UserController@store')->name('user.store');
