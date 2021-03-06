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
Route::get('uploads', ['as' => 'uploads', 'uses' => 'FileUploadController@indexmulti']);
Route::post('uploads', ['as' => 'uploads.store', 'uses' => 'FileUploadController@storemulti']);

// auto complete
Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');

// form validation
Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/create', 'UserController@store')->name('user.store');

Auth::routes(['verify' => true]);

Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard')->middleware('admin');
Route::get('member/dashboard', 'MemberController@dashboard')->name('member.dashboard')->middleware(['member', 'verified']);
Route::get('home', 'HomeController@index')->name('home');
Route::get('registered', 'HomeController@registered')->name('registered')->middleware('verify');


// form validation ajax
Route::get('user/ajaxcreate', 'UserController@ajaxcreate')->name('user.ajaxcreate');
Route::post('user/ajaxcreate', 'UserController@ajaxstore')->name('user.ajaxstore');

// exelation
Route::get('excel', 'ExcelController@index')->name('excel.index');
Route::post('excel', 'ExcelController@store')->name('excel.store');
