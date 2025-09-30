<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwaggerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Public routes
Route::get('/users', [SwaggerController::class, 'show']);
Route::get('/users/{id}', [SwaggerController::class, 'getUserById']);
Route::post('/user/create', [SwaggerController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Protected routes (require Sanctum token)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::put('/users/{id}', [SwaggerController::class, 'update']);
    Route::patch('/users/{id}/password', [SwaggerController::class, 'updatePassword']);
    Route::delete('/users/{id}', [SwaggerController::class, 'destroy']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::get('/user', function (Request $request) {
        return response()->json(['user' => $request->user()]);
    });
});