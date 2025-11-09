<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'index']);

Route::get('/api/ping', function () {
    return response()->json([
        'message' => 'pong',
        'service' => 'auth-service',
        'timestamp' => now()
    ]);
});