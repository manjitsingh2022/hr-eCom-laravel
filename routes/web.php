<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('category/{category}/{categoryname}', [UserController::class, 'showdataCategory'])->name('category.show');

// Route::get('/product-details/{id}', [CartController::class, 'product_details'])->name('product.details');
// Route::get('admin/cart/{$id}', [CartController::class, 'cartadd'])->name('cartadd');

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('admin', [AdminController::class, 'adminIndex'])->name('dashboard');

        Route::get('admin/view_category', [CategoryController::class, 'view_category'])->name('viewcategorylist');
        Route::get('admin/delete_catagory/{id}', [CategoryController::class, 'delete_catagory']);
        Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('viewcategory');
        Route::post('categories', [CategoryController::class, 'storeCatgory'])->name('categories.store');
        Route::post('get-subcategories', [CategoryController::class, 'getSubcategories'])->name('getSubcategories');

        Route::get('admin/product/create', [ProductController::class, 'show'])->name('product');
        Route::post('products', [ProductController::class, 'storeProduct'])->name('products.store');

        Route::get('admin/view_product', [ProductController::class, 'view_product'])->name('viewproduct');
        Route::get('admin/show_product', [ProductController::class, 'show_product'])->name('showproduct');
        Route::get('admin/product/{id}/delete', [ProductController::class, 'delete_product'])->name('product.delete');
        Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update');




        Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');
    });
});


// Route::fallback(function () {
//     return view('auth.login');
// });
