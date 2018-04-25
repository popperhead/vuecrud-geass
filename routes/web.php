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
// blog api starts
Route::get('/', 'ArticlesController@index');
Route::get('/fetch', 'ArticlesController@fetch');
Route::post('/createarticle','ArticlesController@create');
Route::post('/deletearticle','ArticlesController@delete');
Route::post('/editarticle','ArticlesController@edit');
// blog api ends
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user', 'UsersController');