<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class QuizController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'service' => 'Quiz Service',
            'status' => 'running'
        ]);
    }
}