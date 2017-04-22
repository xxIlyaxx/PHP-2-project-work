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

Route::get('/', ['as' => 'home', 'uses' => 'IndexController@showIndex']);

Route::get('/albums', ['as' => 'albums', 'uses' => 'IndexController@showAlbums']);

Route::get('/biography', ['as' => 'biography', 'uses' => 'IndexController@showBiography']);

Route::get('/album/{name}', ['as' => 'album', 'uses' => 'IndexController@showAlbum'])
    ->where('name', '[A-Za-z-]+');
