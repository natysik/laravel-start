<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
	AboutController,
	ContactsController,
	MainController
};

Route::group(['namespace' => 'Post'], function(){
	Route::get('/posts', 'IndexController')->name('posts.index');
	Route::get('/posts/create','CreateController')->name('posts.create');
	Route::post('/posts', 'StoreController')->name('posts.store');
	Route::get('/posts/{post}', 'ShowController')->name('posts.show');
	Route::get('/posts/{post}/edit', 'EditController')->name('posts.edit');
	Route::patch('/posts/{post}', 'UpdateController')->name('posts.update');
	Route::delete('/posts/{post}', 'DestroyController')->name('posts.destroy');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
	Route::group(['namespace' => 'Post'], function(){
		Route::get('/post', 'IndexController')->name('admin.post.index');
		Route::get('/post/create', 'CreateController')->name('admin.post.create');
		Route::post('/post', 'StoreController')->name('admin.post.store');
		Route::get('/posts/{post}', 'ShowController')->name('admin.post.show');
		Route::get('/posts/{post}/edit', 'EditController')->name('admin.post.edit');
		Route::patch('/posts/{post}', 'UpdateController')->name('admin.post.update');
		Route::delete('/posts/{post}', 'DestroyController')->name('admin.post.destroy');
	});
});

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');