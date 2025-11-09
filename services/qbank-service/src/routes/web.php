<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/', [QuestionController::class, 'index']);

Route::get('/api/ping', function () {
    return response()->json([
        'message' => 'pong',
        'service' => 'question-service',
        'timestamp' => now()
    ]);
});