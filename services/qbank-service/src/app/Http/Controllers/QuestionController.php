<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Question::all()
        ]);
    }

    public function store(Request $request)
    {
        $question = new Question();

        $question->subject_id = $request->subject_id;
        $question->difficulty = $request->difficulty;
        $question->type = $request->type;
        $question->question_text = $request->question_text;
        $question->options = $request->options;   // raw JSON OK
        $question->answer = $request->answer;
        $question->created_by = $request->created_by;

        $question->save();

        return response()->json([
            'message' => 'Question created successfully',
            'data' => $question
        ], 201);
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);

        return response()->json([
            'data' => $question
        ]);
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $question->subject_id = $request->subject_id ?? $question->subject_id;
        $question->difficulty = $request->difficulty ?? $question->difficulty;
        $question->type = $request->type ?? $question->type;
        $question->question_text = $request->question_text ?? $question->question_text;
        $question->options = $request->options ?? $question->options;
        $question->answer = $request->answer ?? $question->answer;

        $question->save();

        return response()->json([
            'message' => 'Question updated',
            'data' => $question
        ]);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json([
            'message' => 'Question deleted'
        ]);
    }
}