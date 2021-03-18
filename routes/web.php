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


Route::get('/layouts', function () {
    return view('layouts');
});

Route::get('/test','Tester@test');

Route::get('/login','LoginController@index')->name('login');
Route::post('/login/checklogin','LoginController@checklogin');
Route::get('/login/successlogin','LoginController@successlogin');
Route::get('/login/logout','LoginController@logout');

Route::get('/register','RegisterController@index')->name('register.index');
Route::post('/register/checkregister','RegisterController@checkregister');

Route::get('/profile','ProfileController@index')->name('profile.index')->middleware('auth');
Route::post('/profile/changepass','ProfileController@changepass')->name('profile.changepass')->middleware('auth');

Route::get('/','PostController@index');
