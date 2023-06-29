<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\AdminController;

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
Route::get('email/verify/{id}/{hash}', [ActionController::class, 'verifyemailhash'])->name('verification.verify');
Route::get('email/verify', [ActionController::class, 'verifyemail'])->middleware('auth')->name('verification.notice');
Route::post('email/verification-notification', [ActionController::class, 'emailnotification'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('forgot-password', [ActionController::class, 'forgotpassword'])->middleware('guest')->name('password.request');
Route::post('forgot-password', [ActionController::class, 'forgotpasswordpost'])->middleware('guest')->name('password.email');
Route::get('reset-password/{token}', [ActionController::class, 'resetpasswordtoken'])->middleware('guest')->name('password.reset');

Route::post('reset-password', [ActionController::class, 'resetpassword'])->middleware('guest')->name('password.update');

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('login', [UserController::class, 'login'])->name('login')->middleware('userlogin');
Route::get('loginpost', [UserController::class, 'loginpost'])->name('loginpost');
Route::get('register', [UserController::class, 'register'])->name('register')->middleware('userlogin');
Route::post('registerpost', [UserController::class, 'registerpost'])->name('registerpost');
Route::get('contact-us', [UserController::class, 'contact'])->name('contact');
Route::get('category/{category}/{categoryname}', [UserController::class, 'showdataCategory'])->name('category.show');




Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/password-change', [UserController::class, 'showPasswordChangeForm'])->name('password.change');
    Route::post('/password-change', [UserController::class, 'passwordChange'])->name('password.change.submit');

    Route::post('wishlist/add/{product}', [UserController::class, 'addToWishlist'])->name('wishlist.add');
    Route::get('wishlist', [UserController::class, 'wishlistindex'])->name('wishlist');
    Route::post('wishlist/remove/{product}', [UserController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('admin', [AdminController::class, 'adminIndex'])->name('dashboard');
        Route::get('admin/view_category', [CategoryController::class, 'view_category'])->name('viewcategorylist');
        Route::get('admin/delete_catagory/{id}', [CategoryController::class, 'delete_catagory'])->name('delete_category');
        Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('viewcategory');
        Route::post('categories', [CategoryController::class, 'storeCatgory'])->name('categories.store');
        Route::post('get-subcategories', [CategoryController::class, 'getSubcategories'])->name('getSubcategories');
        Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('edit_category');
        Route::post('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');


        Route::get('admin/product/create', [ProductController::class, 'show'])->name('product');
        Route::post('products', [ProductController::class, 'storeProduct'])->name('products.store');
        Route::get('admin/view_product', [ProductController::class, 'view_product'])->name('viewproduct');
        Route::get('admin/show_product', [ProductController::class, 'show_product'])->name('showproduct');
        Route::get('admin/product/{id}/delete', [ProductController::class, 'delete_product'])->name('product.delete');
        Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

        Route::get('admin/settings', [AdminController::class, 'setting'])->name('viewsettings');
        Route::post('admin/settingspost', [AdminController::class, 'settingstore'])->name('settings.store');
        Route::delete('/settings/{setting}', [AdminController::class, 'destroy'])->name('settings.destroy');
        Route::get('settings/{setting}/edit', [AdminController::class, 'edit'])->name('settings.edit');
        Route::put('settings/{setting}',   [AdminController::class, 'update'])->name('settings.update');

        Route::get('logout', [UserController::class, 'logout'])->name('logout');
    });
});
Route::fallback(function () {
    if (request()->route() === null) {
        return redirect()->route('home');
    }
});
