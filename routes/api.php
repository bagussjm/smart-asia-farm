<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\KostImageController;
use App\Http\Controllers\api\KostVideoController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\LandmarkApiController;
use App\Http\Controllers\Api\WahanaApiController;
use App\Http\Controllers\Api\KeranjangApiController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users',[UserApiController::class,'index']);

Route::prefix('/landmark')->group(function (){
    Route::get('/',[LandmarkApiController::class,'index']);
});

Route::prefix('/wahana')->group(function (){
    Route::get('/',[WahanaApiController::class,'index']);
});

Route::prefix('/keranjang')->group(function (){
    Route::get('/',[KeranjangApiController::class,'index']);
    Route::post('/',[KeranjangApiController::class,'store']);
});

// utils
Route::post('/image/post', [KostImageController::class,'post']);
Route::post('/image/remove', [KostImageController::class,'remove']);
Route::post('/image/{wahana}/pull', [KostImageController::class,'pull']);

Route::post('/video/post',[KostVideoController::class,'post']);
Route::post('/video/remove',[KostVideoController::class,'remove']);
Route::post('/video/{kost}/pull',[KostVideoController::class,'pull']);



