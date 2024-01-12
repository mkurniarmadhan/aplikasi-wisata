<?php

use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






Route::middleware(['auth'])->group(function () {


    // user
    Route::get('/checkout/{wisata}', [HomePageController::class, 'checkout'])->name('homepage.checkout');
    Route::get('/invoice', [HomePageController::class, 'invoice'])->name('homepage.invoice');
    Route::get('/invoice/{order}', [HomePageController::class, 'invoiceShow'])->name('homepage.invoice.show');
    Route::post('checkoutStore/{wisata}', [HomePageController::class, 'checkoutStore'])->name('homepahe.checkoutStore');
    Route::post('uploadBuktiBayar/{order}', [HomePageController::class, 'uploadBuktiBayar'])->name('homepahe.uploadBuktiBayar');



    // admin


    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('pesanan', [AdminController::class, 'pesanan'])->name('pesanan');
        Route::get('pesanan/{order}', [AdminController::class, 'pesananShow'])->name('pesanan.show');
        Route::get('konfirmasiPembayaran/{order}', [AdminController::class, 'konfirmasiPembayaran'])->name('konfirmasiPembayaran');

        Route::resource('wisata', WisataController::class)->parameters([
            'wisata' => 'wisata'
        ]);
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/', [HomePageController::class, 'index'])->name('homepage.index');
Route::get('/show/{wisata}', [HomePageController::class, 'show'])->name('homepage.show');


// AUTH


Route::middleware(['guest'])->group(function () {

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('doLogin', [AuthController::class, 'doLogin'])->name('doLogin');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('doregister', [AuthController::class, 'doRegister'])->name('doRegister');
});
