<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'service' => 'Auth Service',
            'status' => 'running'
        ]);
    }
}
