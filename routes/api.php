<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SpotApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// 景點 API CRUD
Route::get('/spots', [SpotApiController::class, 'index']);
Route::post('/spots', [SpotApiController::class, 'store']);
Route::put('/spots/{id}', [SpotApiController::class, 'update']);
Route::delete('/spots/{id}', [SpotApiController::class, 'destroy']);
