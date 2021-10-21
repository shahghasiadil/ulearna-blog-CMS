<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Logout;
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
Route::redirect('/home', '/');
Route::get('/login', [LoginController::class ,'index'])->name('login');
Route::post('/login', [LoginController::class ,'authenticate'])->name("authenticate");
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::middleware(['auth'])->group(function () {
    
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::get('/logout', [LoginController::class ,'logout'])->name('logout');
    Route::resource('/posts', PostController::class);
    Route::get('/posts/post/restore/{id}', [PostController::class,'restore'])->name('posts.restore');
    Route::delete('posts/delete/{id}', [PostController::class ,'forceDelete'])->name('posts.force-delete');
    Route::get('/posts/post/archive', [PostController::class, 'archive'])->name('posts.archive');
    Route::post('/posts/{post}/likes', [LikeController::class ,'store'])->name('posts.likes');
    Route::delete('/posts/{post}/likes', [LikeController::class ,'destroy'])->name('posts.unlike');
    Route::get('/users/{user}/profile', [UserController::class ,'index'])->name('profile');
    Route::get('users/notifications/{id}', [UserController::class,'read'])->name('read-notification');
    Route::resource('/categories', CategoryController::class);
});
