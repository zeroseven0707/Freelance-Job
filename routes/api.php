<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContentIdeaController;
use App\Http\Controllers\Api\KeywordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// AUTH
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/keywords', [KeywordController::class, 'import']);
    Route::get('/keywords', [KeywordController::class, 'index']);
    Route::put('/keywords/{id}', [KeywordController::class, 'update']);
    Route::get('/keywords/{id}', [KeywordController::class, 'show']);
    Route::delete('/keywords/{id}', [KeywordController::class, 'destroy']);

    Route::post('/content-ideas', [ContentIdeaController::class, 'import']);
    Route::get('/content-ideas', [ContentIdeaController::class, 'index']);
    Route::put('/content-ideas/{id}', [ContentIdeaController::class, 'update']);
    Route::get('/content-ideas/{id}', [ContentIdeaController::class, 'show']);
    Route::delete('/content-ideas/{id}', [ContentIdeaController::class, 'destroy']);
   
    // Route::middleware('role:admin')->group(function () {
    // });
    // Route::middleware('role:freelance')->group(function () {
    // });
});
