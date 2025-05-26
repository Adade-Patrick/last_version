<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('v1/auth/login',[UserApiController::class,'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/v1/auth')->group(function () {
       Route::get('/me', [UserApiController::class,'me']);
       Route::get('/logout', [UserApiController::class,'logout']);
    });
});
