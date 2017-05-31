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

Route::get('/', 'omdb@request');    


Auth::routes();

Route::get('/home', 'omdb@request');

Route::get('/details/{movie_id}', 'omdb@getDetails');

Route::get('/add', 'omdb@insertFavourite');

Route::get('/getF', 'omdb@getFavourites');