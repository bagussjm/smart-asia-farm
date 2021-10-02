<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WahanaController;
use App\Http\Controllers\LandMarkController;
use App\Http\Controllers\PaymentCheckoutController;
use App\Http\Controllers\PemesananController;

// authentication
Route::get('login',[AuthController::class,'login'])->name('auth.login');
Route::post('login',[AuthController::class,'authenticate'])->name('auth.authenticate');
Route::get('register',[AuthController::class,'signup'])->name('auth.signup');
Route::post('register',[AuthController::class,'register'])->name('auth.register');
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');

// landing page
Route::get('/', function (){
    return Redirect::route('auth.login');
})->name('app.landing');

Route::middleware('role:pengelola')->group(function (){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('pengelola.dashboard');

    Route::prefix('/wahana')->group(function (){
        Route::get('/',[WahanaController::class,'index'])->name('playground.index');
        Route::get('tambah',[WahanaController::class,'create'])->name('playground.create');
        Route::post('tambah',[WahanaController::class,'store'])->name('playground.store');
        Route::get('/{wahana}',[WahanaController::class,'show'])->name('playground.show');
        Route::get('/{wahana}/edit',[WahanaController::class,'edit'])->name('playground.edit');
        Route::put('/{wahana}/edit',[WahanaController::class,'update'])->name('playground.update');
        Route::delete('/{wahana}/delete',[WahanaController::class,'delete'])->name('playground.delete');
    });

    Route::prefix('/landmark')->group(function (){
        Route::get('/',[LandMarkController::class,'index'])->name('landmark.index');
        Route::get('/tambah',[LandMarkController::class,'create'])->name('landmark.create');
        Route::post('/tambah',[LandMarkController::class,'store'])->name('landmark.store');
        Route::get('/{landmark}',[LandMarkController::class,'show'])->name('landmark.show');
        Route::get('/{landmark}/edit',[LandMarkController::class,'edit'])->name('landmark.edit');
        Route::put('/{landmark}/update',[LandMarkController::class,'update'])->name('landmark.update');
        Route::delete('/{landmark}/delete',[LandMarkController::class,'delete'])->name('landmark.delete');
    });

    Route::prefix('pemesanan')->group(function (){
        Route::get('/tiket/wahana',[PemesananController::class,'index'])->name('pemesanan.index');
        Route::get('/tiket/masuk',[PemesananController::class,'tiketMasuk'])->name('pemesanan.masuk');
        Route::get('/{ticket}',[PemesananController::class,'show'])->name('pemesanan.show');
        Route::post('/tiket-masuk',[PemesananController::class,'entranceTicket'])->name('pemesanan.tiket-masuk');
    });

    Route::get('payment',[PaymentCheckoutController::class,'pay'])->name('payment.index');
    Route::post('process',[PaymentCheckoutController::class,'process'])->name('payment.process');
});


// utils
Route::get('storage-link',function (){
   Artisan::call('storage:link');
});

Route::get('clear-cache',function (){
   Artisan::call('cache:clear');
});

Route::get('clear-config',function (){
    Artisan::call('config:clear');
});
