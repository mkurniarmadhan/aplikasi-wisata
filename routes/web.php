<?php

use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Route::get('setup', function () {

    Artisan::call('key:generate');
});

// ini dapat di akses kalo sudah login
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
        Route::get('rekening', [AdminController::class, 'rekening'])->name('rekening.index');
        Route::get('rekening/{rekening}', [AdminController::class, 'rekening_detail'])->name('rekening.show');



        Route::resource('wisata', WisataController::class)->parameters([
            'wisata' => 'wisata'
        ]);
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});




// yang belum login saja
Route::middleware(['guest'])->group(function () { // cek login . kalo sudah diarahkan ke halaman utaman (/)
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('doLogin', [AuthController::class, 'doLogin'])->name('doLogin');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('doregister', [AuthController::class, 'doRegister'])->name('doRegister');
});


// ini siapapun bisa akses
Route::get('/', [HomePageController::class, 'index'])->name('homepage.index');
Route::get('/show/{wisata}', [HomePageController::class, 'show'])->name('homepage.show');
