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


//Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/new', 'HomeController@new_link')->name('new')->middleware('auth');
Route::post('/new', 'HomeController@new_link')->name('new')->middleware('auth');

Route::get('/view/{id}', 'HomeController@view_link')->name('view')->middleware('auth');
Route::get('/delete/{id}', 'HomeController@delete_link')->name('delete')->middleware('auth');



Route::get('/links/{link}', 'HomeController@resolve_link')->name('links');
