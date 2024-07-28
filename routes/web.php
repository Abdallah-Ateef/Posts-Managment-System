<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class,'home'])->name('home');

Route::resource('posts',PostController::class)->names([
//    'index'=>'posts.index',
//    'create'=>'posts.create',
//    'store'=>'posts.store',
//    'edit'=>'posts.edit',
//    'update'=>'posts.update',
//    'destroy'=>'posts.destroy',
//    'show'=>'posts.show',
]);

 Route::get('/search',[PostController::class,'search'])->name('posts.search');
 Route::resource('users',UserController::class);
 Route::get('user/posts/{id}',[UserController::class,'posts'])->name('user.posts');
 Route::resource('tags',TagController::class);

