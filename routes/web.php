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

//front End Page
Route::get('/', 'PostController@index');
Route::get('/home', 'PostController@index');
Route::get('/dashboard', 'PostController@index');
Route::get('/postsid/{id}', 'PostController@show');
Route::get('/postsby/{usernya}', 'IndexController@postsby');
Route::get('/postcat/{categorynya}', 'IndexController@postcat');

//Dashboard
Route::resource('/kontak','ControllerKontak');

Route::resource('dashboard/users', 'UserController');

Route::resource('dashboard/roles', 'RoleController');

Route::resource('dashboard/permissions', 'PermissionController');

//posts
Route::get('dashboard/judul/myjudul', 'JudulController@myjudul');
Route::resource('dashboard/posts', 'PostController');

//Category
Route::resource('dashboard/category','CatController');

//judul
Route::resource('dashboard/judul', 'JudulController');

//datatable controller
Route::get('datatable/judulmahasiswa', 'DatatableController@judulmahasiswa');
Route::get('cobain', 'DatatableController@cobain');
Route::get('judulnya', ['uses'=>'DatatableController@cobain', 'as'=>'ini.coba']);