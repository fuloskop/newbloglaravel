<?php

use Illuminate\Support\Facades\Route;



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

Route::resource('/post', 'PostController');

Route::post('/post/{post}/create','CommentController@create');


Route::get('/layouts', function () {
    return view('layouts');
});

Route::get('/test','Tester@test');

Route::get('/login','LoginController@index')->name('login')->middleware('guest');
Route::post('/login/checklogin','LoginController@checklogin');
Route::get('/login/successlogin','LoginController@successlogin');
Route::get('/login/logout','LoginController@logout');

Route::get('/register','RegisterController@index')->name('register.index')->middleware('guest');
Route::post('/register/checkregister','RegisterController@checkregister');

Route::get('/profile','ProfileController@index')->name('profile.index')->middleware('auth');
Route::post('/profile/changepass','ProfileController@changepass')->name('profile.changepass')->middleware('auth');
Route::post('/profile/changeavatar','ProfileController@changeavatar')->name('profile.changeavatar')->middleware('auth');
Route::get('/profile/deleteavatar','ProfileController@deleteavatar')->name('profile.deleteavatar')->middleware('auth');

//Route::get('/login/forgot','LoginController@forgot')->name('login.forgot')->middleware('guest');

Route::get('/forgot-password','LoginController@passforgot')->middleware('guest')->name('password.request');

Route::post('/forgot-password', 'LoginController@passforgotwithrequest')->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', 'LoginController@passresetwithtoken')->middleware('guest')->name('password.reset');

Route::post('/reset-password', 'LoginController@passreset')->middleware('guest')->name('password.update');

Route::post('/ajax-request', 'PostLikeController@ChangeStatus');

route::get('/getlikes/{id}','PostLikeController@GetLikes');


Route::get('/','PostController@index');
