<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'index']);

Route::get('/api/ping', function () {
    return response()->json([
        'message' => 'pong',
        'service' => 'auth-service',
        'timestamp' => now()
    ]);
});