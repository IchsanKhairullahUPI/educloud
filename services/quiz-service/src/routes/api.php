<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;

Route::get('/quizzes', [QuizController::class, 'index']);
Route::post('/quizzes', [QuizController::class, 'store']);
Route::get('/quizzes/{id}', [QuizController::class, 'show']);
Route::put('/quizzes/{id}', [QuizController::class, 'update']);
Route::delete('/quizzes/{id}', [QuizController::class, 'destroy']);

Route::post('/quizzes/{id}/questions', [QuizQuestionController::class, 'addQuestions']);
Route::get('/quizzes/{id}/questions', [QuizQuestionController::class, 'listQuestions']);
