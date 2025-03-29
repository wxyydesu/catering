<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductDetailController;

// Default home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Resource routes
Route::resource('/shop', ShopController::class)->names(['index' => 'shop']);
Route::resource('/about', AboutController::class);
Route::resource('/contact', ContactController::class);
Route::resource('/shopping-cart', ShoppingCartController::class);
Route::resource('/paket', PaketController::class);
Route::resource('/order', OrderController::class);
Route::resource('/payment_method', PaymentMethodController::class);
Route::resource('/product_detail', ProductDetailController::class);

// Dashboard routes with session check
Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/kurir/dashboard', [KurirController::class, 'index'])->name('kurir.index');
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.index');
});

// Payment method detail routes
Route::get('/detail_payment_method/{id}/{payment_method}', [PaymentMethodController::class, 'add'])->name('add');
Route::post('/detail_payment_method', [PaymentMethodController::class, 'tambah'])->name('tambah');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login-user', [\App\Http\Controllers\AuthController::class,'loginUser'])->name('login-user');

Route::get('/signup', [\App\Http\Controllers\AuthController::class,'registration']);
Route::post('/signup-user', [\App\Http\Controllers\AuthController::class,'registerUser'])->name('register-user');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
