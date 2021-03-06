<?php

use Illuminate\Support\Facades\Input;

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

Route::get('/', 'SpotifyController@index')->name('index');
Route::get('/callback/', 'SpotifyController@callback')->name('callback');
Route::get('/success', 'SpotifyController@success')->name('success');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users', 'HomeController@users');
Route::get('/playlists', 'HomeController@playlists');
Route::get('/top-artists', 'HomeController@topArtists');
Route::get('/artist', 'HomeController@artist');
Route::get('/export', 'HomeController@export');
