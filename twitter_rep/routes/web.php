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
Route::get('/logout', 'MasterController@logout');

Route::group(['prefix' => 'masters/{id}'], function () {
    Route::get('following', 'UsersController@following')->name('following');
    Route::get('followed', 'UsersController@followed')->name('followed');
    Route::post('follow', 'FollowerController@store')->name('follow');
    // Route::delete('unfollow', 'FollowerController@destroy')->name('unfollow');
    Route::get('unfollow', 'FollowerController@destroy')->name('unfollow');
});