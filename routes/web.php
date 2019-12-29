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

Route::get('/', 'ProductController@index')->middleware('auth');


Route::resource('aliases', 'AliasController')->middleware('auth');
Route::resource('brands', 'BrandController')->middleware('auth');
Route::resource('categories', 'CategoryController')->middleware('auth');
Route::get('/get-sub-categories/{id}', 'CategoryController@getSubCategories')->where('id', '[0-9]+')->middleware('auth');
Route::resource('products', 'ProductController')->middleware('auth');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');
