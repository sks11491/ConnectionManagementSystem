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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/home/send-friend-request/{friend_id}', 'HomeController@friendRequest')->name('sendFriendRequest');
    Route::get('/home/accept-friend-request/{friend_id}', 'HomeController@acceptRequest')->name('acceptFriendRequest');
    Route::get('/home/block-friend-request/{friend_id}', 'HomeController@blockFriend')->name('blockFriendRequest');
    Route::get('list-logs', 'HomeController@listUserActionLogs')->name('list-logs');
});

