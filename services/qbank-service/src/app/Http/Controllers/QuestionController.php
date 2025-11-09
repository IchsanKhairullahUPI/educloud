<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'service' => 'Question Service',
            'status' => 'running'
        ]);
    }
}
