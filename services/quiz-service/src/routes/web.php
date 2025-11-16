<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;

Route::get('/api/quizzes', [QuizController::class, 'index'])
    ->withoutMiddleware(['web', 'session']);
Route::post('/api/quizzes', [QuizController::class, 'store'])
    ->withoutMiddleware(['web', 'session']);
Route::get('/api/quizzes/{id}', [QuizController::class, 'show'])
    ->withoutMiddleware(['web', 'session']);
Route::put('/api/quizzes/{id}', [QuizController::class, 'update'])
    ->withoutMiddleware(['web', 'session']);
Route::delete('/api/quizzes/{id}', [QuizController::class, 'destroy'])
    ->withoutMiddleware(['web', 'session']);

Route::post('/api/quizzes/{id}/questions', [QuizQuestionController::class, 'addQuestions'])
    ->withoutMiddleware(['web', 'session']);
Route::get('/api/quizzes/{id}/questions', [QuizQuestionController::class, 'listQuestions'])
    ->withoutMiddleware(['web', 'session']);