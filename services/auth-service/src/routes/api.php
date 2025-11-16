<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/ping', function () {
    return response()->json([
        'message' => 'pong',
        'service' => 'auth-service',
        'timestamp' => now(),
    ]);
});

Route::apiResource('users', UserController::class);
