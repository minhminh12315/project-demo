<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::post('/register', [AdminController::class, 'store'])->name('register.store');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{id}', [HomeController::class, 'shopByCategory'])->name('shop.category');
Route::get('/product/{name}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::post('/getProductByColor', [HomeController::class, 'productDetailColor'])->name('product.detail.color');

Route::get('/product/{id}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/addnew' , [ProductController::class, 'addnew'])->name('addnew');
    Route::post('/addnew' , [ProductController::class, 'storeProduct'])->name('addnew.store');

    Route::post('/admin/category/store', [ProductController::class, 'storeCategory'])->name('category.store');

    // Route::get('/addnew/category', [ProductController::class, 'addnewCategory'])->name('addnew.category');
    // Route::post('/addnew/category', [ProductController::class, 'storeCategory'])->name('addnew.category.store');

    // Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    // Route::post('/edit/{id}', [ProductController::class, 'update'])->name('edit.update');
    // Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('destroy');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('home.checkout');
    Route::post('/checkoutStore', [CartController::class, 'storeOrder'])->name('home.storeOrder');

    Route::get('/user_info', [HomeController::class, 'userInfo'])->name('user.info');
    Route::get('/user_info/edit', [HomeController::class, 'editUserInfo'])->name('user.info.edit');
    Route::post('/user_info/update', [HomeController::class, 'updateUserInfo'])->name('user.info.update');
    Route::get('/user_info/edit/password', [HomeController::class, 'editUserInfoPassword'])->name('user.info.edit.password');
    Route::post('/user_info/edit/password', [HomeController::class, 'updateUserInfoPassword'])->name('user.info.update.password');

    Route::get('/orders', [HomeController::class, 'orders'])->name('user.orders');
});

