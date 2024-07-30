<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class,'home'])->name('home');
Route::get('/search',[PostController::class,'search'])->name('posts.search');

Route::middleware(['auth'])->group(function (){
    Route::resource('posts',PostController::class);
    Route::resource('users',UserController::class)->middleware('can:admin_control');
    Route::get('user/posts/{id}',[UserController::class,'posts'])->name('user.posts');
    Route::resource('tags',TagController::class);

});

Route::get('findpost',[PostController::class,'findpost'])->name('findpost');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
