<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function users()
    {
        $response = Http::get(env('AUTH_SERVICE_URL') . '/api/users');

        return view('users', [
            'users' => $response->json()['data']
        ]);
    }

    public function questions()
    {
        $response = Http::get(env('QBANK_SERVICE_URL') . '/api/questions');

        return view('questions', [
            'questions' => $response->json()['data']
        ]);
    }
}
