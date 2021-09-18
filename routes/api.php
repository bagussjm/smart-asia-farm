<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\KostImageController;
use App\Http\Controllers\api\KostVideoController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\LandmarkApiController;
use App\Http\Controllers\Api\WahanaApiController;
use App\Http\Controllers\Api\KeranjangApiController;
use Midtrans\Config;
use Midtrans\Transaction;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/user')->group(function (){
    Route::get('/',[UserApiController::class,'index']);
    Route::get('/{user}/keranjang',[UserApiController::class,'charts']);
});

Route::prefix('/landmark')->group(function (){
    Route::get('/',[LandmarkApiController::class,'index']);
    Route::get('/{landmark}',[LandmarkApiController::class,'show']);
});

Route::prefix('/wahana')->group(function (){
    Route::get('/',[WahanaApiController::class,'index']);
    Route::get('/{wahana}',[WahanaApiController::class,'show']);
});

Route::prefix('/keranjang')->group(function (){
    Route::get('/',[KeranjangApiController::class,'index']);
    Route::post('/',[KeranjangApiController::class,'store']);
    Route::post('/inCart',[KeranjangApiController::class,'inCart']);
});

Route::get('pay',function (){
    Config::$serverKey = 'SB-Mid-server-Vucxcv6_ySUi_dC1Eue9h2Dq';
    Config::$clientKey = 'SB-Mid-client-08UP2Fy1QBzxofOH';
    Config::$isProduction = false;
    Config::$isSanitized = true;

    $tf = Transaction::status('1303625412');

    dd($tf);
});

// utils
Route::post('/image/post', [KostImageController::class,'post']);
Route::post('/image/remove', [KostImageController::class,'remove']);
Route::post('/image/{wahana}/pull', [KostImageController::class,'pull']);

Route::post('/video/post',[KostVideoController::class,'post']);
Route::post('/video/remove',[KostVideoController::class,'remove']);
Route::post('/video/{kost}/pull',[KostVideoController::class,'pull']);



