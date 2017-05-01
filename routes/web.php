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

Route::get('/album/{slug}', ['as' => 'album', 'uses' => 'IndexController@showAlbum']);
//    ->where('slug', '[A-Za-z-]+');

Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@showIndex']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('albums', ['as' => 'admin/albums', 'uses' => 'AdminController@showAlbums']);
    Route::get('album/{slug}', ['as' => 'admin/album', 'uses' => 'AdminController@showAlbum']);
//        ->where('slug', '[A-Za-z-]+');
    Route::get('edit-album', ['as' => 'admin/edit-album', 'uses' => 'AdminController@editAlbum']);
    Route::post('save-album', ['as' => 'admin/save-album', 'uses' => 'AdminController@saveAlbum']);
    Route::get('remove-album', ['as' => 'admin/remove-album', 'uses' => 'AdminController@removeAlbum']);
    Route::get('edit-song', ['as' => 'admin/edit-song', 'uses' => 'AdminController@editSong']);
    Route::post('save-song', ['as' => 'admin/save-song', 'uses' => 'AdminController@saveSong']);
    Route::get('remove-song', ['as' => 'admin/remove-song', 'uses' => 'AdminController@removeSong']);
    Route::get('edit-description', ['as' => 'admin/edit-description', 'uses' => 'AdminController@editDescription']);
    Route::post('save-description', ['as' => 'admin/save-description', 'uses' => 'AdminController@saveDescription']);
    Route::get('edit-biography', ['as' => 'admin/edit-biography', 'uses' => 'AdminController@editBiography']);
    Route::post('save-biography', ['as' => 'admin/save-biography', 'uses' => 'AdminController@saveBiography']);
});
