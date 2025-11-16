<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'index']);

Route::get('/api/ping', function () {
    return response()->json([
        'message' => 'pong',
        'service' => 'auth-service',
        'timestamp' => now()
    ]);
});

Route::apiResource('/api/users', UserController::class)->withoutMiddleware(['web', 'session']);