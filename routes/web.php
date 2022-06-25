<?php

use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BookselvesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/bookselves', [BookselvesController::class, 'index'])->name('bookselves');
Route::get('/books/category/{kategori_id}', [CategoriesController::class, 'category'])->name('category');

Auth::routes();

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/book/detail/{slug}', [BookselvesController::class, 'detail'])->name('detail-book');
});

Route::prefix('admin')->group(function () {
    Route::middleware(['middleware' => 'auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('users', UsersController::class);
        Route::resource('books', BooksController::class);
        Route::resource('book-category', CategoryController::class);
    });
});