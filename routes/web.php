<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/', [AdminController::class, 'login'])->name('login');
Route::post('/', [AdminController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::post('/register', [AdminController::class, 'store'])->name('register.store');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/addnew' , [AdminController::class, 'addnew'])->name('addnew');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});