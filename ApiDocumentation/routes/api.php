<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SwaggerController;

Route::get('/users', [SwaggerController::class, 'show']);
Route::get('/users/{id}', [SwaggerController::class, 'getUserById']);
Route::post('/user/create', [SwaggerController::class, 'store']);
Route::put('/users/{id}', [SwaggerController::class, 'update']);
Route::patch('/users/{id}/password', [SwaggerController::class, 'updatePassword']);
Route::delete('/users/{id}', [SwaggerController::class, 'destroy']);

Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});