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

//Home page
Route::get('/', ['as' => 'home', 'uses' => 'IndexController@showIndex']);

//Albums page
Route::get('/albums', ['as' => 'albums', 'uses' => 'IndexController@showAlbums']);

//Biography page
Route::get('/biography', ['as' => 'biography', 'uses' => 'IndexController@showBiography']);

//Album page
Route::get('/albums/{slug}', ['as' => 'album', 'uses' => 'IndexController@showAlbum'])
    ->where('slug', '^[a-z0-9](-?[a-z0-9]+)*$');

//Photos page
Route::get('/photos', ['as' => 'photos', 'uses' => 'IndexController@showPhotos']);

//Admin panel
Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@showIndex']);
Route::group(['prefix' => 'admin'], function() {
    //Albums page
    Route::get('albums', ['as' => 'admin/albums', 'uses' => 'AdminController@showAlbums']);
    //Album page
    Route::get('albums/{slug}', ['as' => 'admin/album', 'uses' => 'AdminController@showAlbum'])
        ->where('slug', '^[a-z0-9](-?[a-z0-9]+)*$');
    //Edit album page
    Route::get('edit-album', ['as' => 'admin/edit-album', 'uses' => 'AdminController@editAlbum']);
    //Save album
    Route::post('save-album', ['as' => 'admin/save-album', 'uses' => 'AdminController@saveAlbum']);
    //Remove album
    Route::get('remove-album', ['as' => 'admin/remove-album', 'uses' => 'AdminController@removeAlbum']);
    //Edit song page
    Route::get('edit-song', ['as' => 'admin/edit-song', 'uses' => 'AdminController@editSong']);
    //Save song
    Route::post('save-song', ['as' => 'admin/save-song', 'uses' => 'AdminController@saveSong']);
    //Remove song
    Route::get('remove-song', ['as' => 'admin/remove-song', 'uses' => 'AdminController@removeSong']);
    //Edit description page
    Route::get('edit-description', ['as' => 'admin/edit-description', 'uses' => 'AdminController@editDescription']);
    //Save description
    Route::post('save-description', ['as' => 'admin/save-description', 'uses' => 'AdminController@saveDescription']);
    //Edit biography page
    Route::get('edit-biography', ['as' => 'admin/edit-biography', 'uses' => 'AdminController@editBiography']);
    //Save biography
    Route::post('save-biography', ['as' => 'admin/save-biography', 'uses' => 'AdminController@saveBiography']);
    //Photos page
    Route::get('photos', ['as' => 'admin/photos', 'uses' => 'AdminController@showPhotos']);
    //Edit photo page
    Route::get('edit-photo', ['as' => 'admin/edit-photo', 'uses' => 'AdminController@editPhoto']);
    //Save photo
    Route::post('save-photo', ['as' => 'admin/save-photo', 'uses' => 'AdminController@savePhoto']);
    //Remove photo
    Route::get('remove-photo', ['as' => 'admin/remove-photo', 'uses' => 'AdminController@removePhoto']);

//    Route::get('band', ['as' => 'admin/band', 'uses' => 'AdminController@showMusicians']);
//    Route::get('edit-musician', ['as' => 'admin/edit-musician', 'uses' => 'AdminController@editMusician']);
//    Route::get('save-musician', ['as' => 'admin/save-musician', 'uses' => 'AdminController@saveMusician']);
});
