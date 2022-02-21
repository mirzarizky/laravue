<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateQuizRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Models\QuestionGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = QuestionGroup::query()
            ->with(['questions', 'questions.options:id,question_id,option_text'])
            ->get();

        return Inertia::render('Admin/Quiz/Index', [
            'quizzes' => $quizzes
        ]);
    }

    public function edit(Question $question)
    {
        $question->load(['options:id,question_id,option_text', 'group', 'questionImage']);

        return Inertia::render('Admin/Quiz/Edit', [
            'question' => QuestionResource::make($question)
        ]);
    }

    public function update(Question $question, UpdateQuizRequest $request)
    {
        $question->load(['options']);

        DB::transaction(function () use ($question, $request) {
            $question->update(['question_text' => $request->input('question_text')]);

            if ($request->hasFile('question_image')) {
                if ($question->hasMedia(Question::QUESTION_IMAGE_COLLECTION_KEY)) {
                    $question->clearMediaCollection(Question::QUESTION_IMAGE_COLLECTION_KEY);
                }

                $question->addMediaFromRequest('question_image')->toMediaCollection(Question::QUESTION_IMAGE_COLLECTION_KEY);
            }

            foreach ($request->input('options') as $option) {
                $question->options
                    ->firstWhere('id', $option['id'])
                    ->update(['option_text' => $option['option_text']]);
            }
        });

        return to_route('admin.quiz.edit', $question);
    }
}
