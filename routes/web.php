<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\HomeController;



Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/posts',[PostController::class, 'getPosts'])->name('show.posts');
Route::get('/posts/{id}',[PostController::class, 'showPost'])->name('show.post');



Route::middleware(['guest'])->group(function () {

    Route::get('/register', function () { return view('auth.register'); })->name('register');
    Route::get('/login', function () { return view('auth.login');})->name('login');

    Route::post('/register', [AuthController::class, 'register']) ->middleware('throttle:10,1')->name('user.register');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1')->name('user.login');

});

Route::middleware(['auth'])->group(function () {

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile/{id}',  [UserController::class, 'profile'])->name('user.profile');
Route::put('/profile/{id}', [UserController::class, 'update'])->name('user.update');
Route::put('/profile/picture/{id}', [UserController::class, 'updateProfilePicture'])->name('profile.picture');
Route::get('/user/{id}/posts', [UserController::class, 'getUserPosts'])->name('user.posts');


Route::get('/create/post', function () { return view('post.create');})->name('create.post');
Route::post('/create/post', [PostController::class, 'storePost'])->name('store.post');
Route::get('/post/{id}',[PostController::class, 'getPostEdit'])->name('get.update.post');
Route::put('/post/{id}', [PostController::class, 'updatePost'])->name('update.post');
Route::delete('/post/{id}', [PostController::class, 'deletePost'])->name('delete.post');

Route::post('/post/{id}/comment', [CommentController::class, 'storeComment'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'deleteComment'])->name('comments.delete');
Route::put('/comments/{id}', [CommentController::class, 'updateComment'])->name('comments.update');


});

