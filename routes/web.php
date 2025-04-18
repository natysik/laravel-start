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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');


Route::get('/posts/update', 'PostController@update');
Route::get('/posts/delete', 'PostController@delete');
Route::get('/posts/first-or-create', 'PostController@firstOrCreate');
Route::get('/posts/update-or-create', 'PostController@updateOrCreate');

Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/about', 'AboutController@index')->name('about.index');
Route::get('/contacts', 'ContactsController@index')->name('contact.index');