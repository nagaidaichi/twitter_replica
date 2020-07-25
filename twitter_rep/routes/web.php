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

Route::get('/', function () {
    return view('index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('masters', 'MasterController');
Route::resource('follower', 'FollowerController');
Route::get('/logout', 'MasterController@logout');
Route::get('follower', 'FollowerController@index');

Route::group(['prefix' => 'masters/{id}'], function () {
    // Route::get('following', 'Users@following')->name('following');
    // Route::get('followed', 'Users@followed')->name('followed');
    Route::post('follow', 'FollowerController@store')->name('follow');
    Route::get('unfollow', 'FollowerController@destroy')->name('unfollow');
});