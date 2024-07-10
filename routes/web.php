<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;



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

Route::get('/', [PostController::class, 'index']);


Route::get('/posts', [PostController::class, 'index']);
Route::post('/comment/{post:slug}', [CommentController::class, 'store'])->name('comment');

Route::get('/posts', [PostController::class, 'posts']);
Route::get('/posts/{post:slug}/like', [PostController::class, 'like'])->name('like')->middleware('auth');
Route::get('posts/{post:slug}', [PostController::class, 'show']);


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


Route::get('/dashboard/categories', [AdminCategoryController::class, 'index'])->middleware('auth');
Route::get('/dashboard/categories/create', [AdminCategoryController::class, 'create'])->middleware('auth');
Route::post('/dashboard/categories/store', [AdminCategoryController::class, 'store'])->middleware('auth');
Route::get('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'destroy'])->middleware('auth');