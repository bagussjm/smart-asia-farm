<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AdminController;

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

Route::middleware('role:admin-pengelola')->group(function (){

});

Route::middleware('role:pemilik')->group(function (){

});


// utils
Route::get('storage-link',function (){
   Artisan::call('storage:link');
});
