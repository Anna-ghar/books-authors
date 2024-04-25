<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('books', '\App\Http\Controllers\BookController');
Route::resource('authors', '\App\Http\Controllers\AuthorController');
Route::get('/search_book', [BookController::class, 'search'])->name('books.search');
Route::get('/search_author', [AuthorController::class, 'search'])->name('authors.search');
Route::get('login', [UserController::class, 'loginForm']);
Route::post('login', [UserController::class,'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


