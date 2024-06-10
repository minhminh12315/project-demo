<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

    

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/addnew' , [AdminController::class, 'addnew'])->name('addnew');
    Route::post('/addnew' , [AdminController::class, 'storeProduct'])->name('addnew.store');

    Route::get('/addnew/color', [AdminController::class, 'addnewColor'])->name('addnew.color');
    Route::post('/addnew/color', [AdminController::class, 'storeColor'])->name('addnew.color.store');

    Route::get('/addnew/size', [AdminController::class, 'addnewSize'])->name('addnew.size');
    Route::post('/addnew/size', [AdminController::class, 'storeSize'])->name('addnew.size.store');

    Route::get('/addnew/category', [AdminController::class, 'addnewCategory'])->name('addnew.category');
    Route::post('/addnew/category', [AdminController::class, 'storeCategory'])->name('addnew.category.store');

    Route::get('/addnew/subcategory', [AdminController::class, 'addnewSubCategory'])->name('addnew.subcategory');
    Route::post('/addnew/subcategory', [AdminController::class, 'storeSubCategory'])->name('addnew.subcategory.store');

    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [AdminController::class, 'update'])->name('edit.update');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('destroy');
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

