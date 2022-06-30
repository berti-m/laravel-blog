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
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

// Main Page
Route::get('/', [PostController::class, 'index'])->name('home');

// Single Post
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('posts/{post:slug}/comment', [PostCommentsController::class, 'store'])->middleware('auth');

// Registration
Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register_store')->middleware('guest');

// Session control (login & logout)
Route::get('login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->name('login')->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');


// Newsletter
Route::post('newsletter', [NewsletterController::class, 'add_user']);

// Dashboard
Route::get('dashboard', [UserController::class, 'index'])->name('dashboard')->middleware('auth');
Route::delete('dashboard/delete', [UserController::class, 'destroy'])->middleware('auth');

// Admin
Route::get('admin/category/create', [CategoryController::class, 'create'])->middleware('admin')->name('new_category');
Route::post('admin/category/create', [CategoryController::class, 'store'])->middleware('admin');

Route::get('admin/category/delete', [CategoryController::class, 'index'])->middleware('admin')->name('delete_category');
Route::delete('admin/category/delete', [CategoryController::class, 'destroy'])->middleware('admin');

Route::get('admin/post/create', [PostController::class, 'create'])->middleware('admin')->name('new_post');
Route::post('admin/post/create', [PostController::class, 'store'])->middleware('admin');

Route::get('posts/{post:slug}/edit', [PostController::class, 'post_edit'])->name('post_edit')->middleware('admin');
Route::post('posts/{post:slug}/edit', [PostController::class, 'update'])->middleware('admin');
Route::delete('posts/{post:slug}/destroy', [PostController::class, 'destroy'])->middleware('admin');