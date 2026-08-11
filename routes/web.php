<?php

use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\SpotController;
use Illuminate\Support\Facades\Route;

Route::get('/front/index', function () {
    return view('front.index');
});

Route::get('/front/travel_list', [SpotController::class, 'list']);

Route::get("/front/travel_list/{id}", [SpotController::class, 'detail']);

Route::get('/admin/spots', [SpotController::class, 'adminList']);

Route::get('/admin/spots/create', [SpotController::class, 'create']);

Route::post('/admin/spots', [SpotController::class, 'store']);

Route::get('/admin/spots/{id}/edit', [SpotController::class, 'edit']);

Route::put('/admin/spots/{id}', [SpotController::class, 'update']);

Route::delete('/admin/spots/{id}', [SpotController::class, 'destroy']);

Route::get('/front/my_favorite', [FavoritesController::class, 'index']);

Route::post('/front/favorites/store', [FavoritesController::class, 'store']);

Route::delete('/front/favorites/{id}', [FavoritesController::class, 'destroy']);
