<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

Route::post('/login',[AuthController::class,'loginUser']);
Route::post('/register',[AuthController::class,'createUser']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('/posts',App\Http\Controllers\Api\PostController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::apiResource('/posts',App\Http\Controllers\Api\PostController::class);
});

Route::get('/readpost',App\http\Controllers\Api\IpostController::class);

