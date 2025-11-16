<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function addQuestions(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        $questions = $request->questions; // array of question_ids

        foreach ($questions as $index => $questionId) {
            QuizQuestion::create([
                'quiz_id' => $quiz->id,
                'question_id' => $questionId,
                'order' => $index + 1
            ]);
        }

        return response()->json([
            'message' => 'Questions added to quiz'
        ]);
    }

    public function listQuestions($quizId)
    {
        return response()->json([
            'data' => QuizQuestion::where('quiz_id', $quizId)->get()
        ]);
    }
}