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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/posts', 'Admin\\PostsController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('system/campus', 'System\\CampusController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('system/career', 'System\\CareerController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('system/subject', 'System\\SubjectController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('system/props/status', 'System\\StatusController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('system/props/cycle', 'System\\CycleController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('system/props/group', 'System\\GroupController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('system/props/usertype', 'System\\UsertypeController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('system/teacher', 'System\\TeacherController');
});
