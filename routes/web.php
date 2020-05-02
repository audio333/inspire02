<?php

use App\User;
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

Route::get('/mark-all-read/{user}', function(User $user) {
	$user->unreadNotifications->markAsRead();
	return response([
		'message' => 'done',
		'notifications' => $user->notifications
	]);
});

Route::get('/','PageController@home')->name('landing');
Route::get('/about-us','PageController@aboutUs')->name('about');
Route::get('/privacy-policy','PageController@privacyPolicy')->name('privacy');

Route::resource('posts', 'PostController');

Route::resource('events', 'EventController');
Route::get('/events/{event:title}', 'EventController@show')->name('events.show');
Route::get('/past-events', 'EventController@pastEvents')->name('events.past');

Route::resource('programs', 'ProgramController');
Route::get('/programs/{program:title}', 'ProgramController@show')->name('programs.show');

Route::resource('professors', 'ProfessorController');
Route::get('/professors/{professor:title}', 'ProfessorController@show')->name('professors.show');
Route::get('/professors/{professor:title}/edit', 'ProfessorController@edit')->name('professors.edit');
Route::put('/professors/{professor:title}', 'ProfessorController@update')->name('professors.update');

Route::get('posts/categories/{category:name}', 'CategoryController@index')->name('posts.categories');
Route::resource('categories', 'CategoryController');

Route::get('posts/user/{user:name}', 'UserController@index')->name('posts.user');

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::any('/admin/{any?}', 'AdminController@index')->where('any', '.*')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');