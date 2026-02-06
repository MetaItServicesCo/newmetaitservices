<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionsDataTable;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(QuestionsDataTable $dataTable)
    {
        return $dataTable->render('pages.questions.list');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $question->id,
                'name' => $question->name,
                'email' => $question->email,
                'country' => $question->country ?? '-',
                'message' => $question->message,
                'agree' => $question->agree ? 'Yes' : 'No',
                'created_at' => $question->created_at->format('d-M-Y'),
            ],
        ]);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response()->json([
            'success' => true,
            'message' => 'Question deleted successfully',
        ]);
    }
}
