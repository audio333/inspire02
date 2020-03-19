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

Route::get('/','PageController@home')->name('landing');
Route::get('/about-us','PageController@aboutUs')->name('about');
Route::get('/privacy-policy','PageController@privacyPolicy')->name('privacy');

Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');