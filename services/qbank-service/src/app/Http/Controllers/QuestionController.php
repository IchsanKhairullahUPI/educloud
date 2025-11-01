<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'service' => 'Question Bank Service',
            'status' => 'running'
        ]);
    }
}
