<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Kost;
use App\Models\FasilitasKost;
use App\Http\Controllers\api\KostImageController;
use App\Http\Controllers\api\KostVideoController;
use App\Models\Region\Kecamatan;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/image/post', [KostImageController::class,'post']);
Route::post('/image/remove', [KostImageController::class,'remove']);
Route::post('/image/{wahana}/pull', [KostImageController::class,'pull']);

Route::post('/video/post',[KostVideoController::class,'post']);
Route::post('/video/remove',[KostVideoController::class,'remove']);
Route::post('/video/{kost}/pull',[KostVideoController::class,'pull']);



