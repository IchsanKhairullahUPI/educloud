<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json([
        'message' => 'pong',
        'service' => 'auth-service',
        'timestamp' => now()
    ]);
})->withoutMiddleware(['web', 'session']);