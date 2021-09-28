<?php

use App\Http\Controllers\api\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\KostImageController;
use App\Http\Controllers\api\KostVideoController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\LandmarkApiController;
use App\Http\Controllers\Api\WahanaApiController;
use App\Http\Controllers\Api\KeranjangApiController;
use App\Http\Controllers\Api\TicketApiController;
use App\Http\Controllers\Api\PaymentNotificationHandlerController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[AuthApiController::class,'login']);
Route::post('/register',[AuthApiController::class,'register']);

Route::prefix('/user')->group(function (){
    Route::get('/',[UserApiController::class,'index']);
    Route::get('/{user}/keranjang',[UserApiController::class,'charts']);
    Route::get('/{user}/tiket',[UserApiController::class,'tickets']);
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
    Route::post('/create',[KeranjangApiController::class,'store']);
    Route::post('/inCart',[KeranjangApiController::class,'inCart']);
    Route::post('/checkout',[KeranjangApiController::class,'checkout']);
});

Route::prefix('/tiket')->group(function (){

});

Route::prefix('/payment')->group(function (){
    Route::post('/payment-notification-handler',[PaymentNotificationHandlerController::class,'handle']);
});
// utils
Route::post('/image/post', [KostImageController::class,'post']);
Route::post('/image/remove', [KostImageController::class,'remove']);
Route::post('/image/{wahana}/pull', [KostImageController::class,'pull']);

Route::post('/video/post',[KostVideoController::class,'post']);
Route::post('/video/remove',[KostVideoController::class,'remove']);
Route::post('/video/{kost}/pull',[KostVideoController::class,'pull']);



