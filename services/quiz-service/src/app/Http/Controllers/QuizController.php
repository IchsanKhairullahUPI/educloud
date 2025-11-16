<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Quiz::all(),
        ]);
    }

    public function store(Request $request)
    {
        $quiz = Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'created_by' => $request->created_by,
        ]);

        return response()->json([
            'message' => 'Quiz created',
            'data' => $quiz
        ], 201);
    }

    public function show($id)
    {
        return response()->json([
            'data' => Quiz::with('questions')->findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->update([
            'title' => $request->title ?? $quiz->title,
            'description' => $request->description ?? $quiz->description,
            'duration_minutes' => $request->duration_minutes ?? $quiz->duration_minutes,
        ]);

        return response()->json([
            'message' => 'Quiz updated',
            'data' => $quiz
        ]);
    }

    public function destroy($id)
    {
        Quiz::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Quiz deleted'
        ]);
    }
}