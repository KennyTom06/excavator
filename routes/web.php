<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/ve-chung-toi', [PageController::class, 'about'])->name('about');
Route::get('/lien-he', [PageController::class, 'contact'])->name('contact');
Route::post('/lien-he', [PageController::class, 'submitContact'])->name('contact.submit');

Route::get('/tin-tuc', [PostController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{slug}', [PostController::class, 'show'])->name('news.show');


Route::get('/dang-nhap', [AuthController::class, 'showLogin'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'login']);
Route::get('/dang-ky', [AuthController::class, 'showRegister'])->name('register');
Route::post('/dang-ky', [AuthController::class, 'register']);
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/thanh-toan', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/dat-hang-thanh-cong/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

Route::get('/gio-hang', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/gio-hang/them', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/gio-hang/cap-nhat', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/gio-hang/xoa', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/gio-hang/cap-nhat', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

Route::middleware('auth')->group(function () {
    Route::get('/lich-su-mua-hang', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/lich-su-mua-hang/{order}', [OrderController::class, 'show'])->name('orders.show');
});
Route::get('/upload', [UploadController::class, 'index'])->name('upload.index');
Route::post('/upload',[UploadController::class,'store'])->name('upload.store');
