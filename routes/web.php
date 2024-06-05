<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::post('/register', [AdminController::class, 'store'])->name('register.store');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/count', [CartController::class, 'getCartItemCount'])->name('cart.count');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/addnew' , [AdminController::class, 'addnew'])->name('addnew');
    Route::post('/addnew' , [AdminController::class, 'storeProduct'])->name('addnew.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [AdminController::class, 'update'])->name('edit.update');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('destroy');
});
