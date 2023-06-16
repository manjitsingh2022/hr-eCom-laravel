<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('loginpost', [UserController::class, 'loginpost'])->name('loginpost');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('registerpost', [UserController::class, 'registerpost'])->name('registerpost');

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('contact-us', [UserController::class, 'contact'])->name('contact');
Route::get('category/{category}', [UserController::class, 'showdataCategory'])->name('category.show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('admin', [AdminController::class, 'adminIndex'])->name('dashboard');
        Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('viewcategory');
        Route::post('categories', [CategoryController::class, 'storeCatgory'])->name('categories.store');
        Route::get('admin/product/create', [ProductController::class, 'show'])->name('product');

        Route::post('products', [ProductController::class, 'storeProduct'])->name('products.store');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');
    });
});


Route::fallback(function () {
    return view('auth.login');
});
