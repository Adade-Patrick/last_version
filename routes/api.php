<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\Resources\CycleController;
use App\Http\Controllers\Api\Resources\AnneeScolaireController;
use App\Http\Controllers\Api\Resources\ClasseController;
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
Route::post('v1/auth/register',[UserApiController::class,'register']);

//mes tests 
Route::prefix('/v1/anneesScolaires')->group(function () {
    Route::get('/all', [AnneeScolaireController::class,'index']);
});


Route::prefix('/v1/cycles')->group(function () {
    Route::get('/all', [CycleController::class,'index']);
});



Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/v1/auth')->group(function () {
       Route::get('/me', [UserApiController::class,'me']);
       Route::get('/profile', [UserApiController::class,'getProfile']);
       Route::get('/logout', [UserApiController::class,'logout']);
    });


    // Route::prefix('/v1/classes')->group(function () {
    //    Route::get('/all', [ClasseController::class,'index']);
    // });

    
});
