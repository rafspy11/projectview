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

Route::get('/', 'UserController@homepage')->name('home');

Route::get('/login', 'UserController@loginForm');

Route::get('/logout', 'UserController@logout');

Route::post('/loginSubmit', 'UserController@loginSubmit');