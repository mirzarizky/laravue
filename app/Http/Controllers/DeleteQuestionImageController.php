<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class DeleteQuestionImageController extends Controller
{
    public function __invoke(Question $question)
    {
        $question->clearMediaCollection(Question::QUESTION_IMAGE_COLLECTION_KEY);

        return response()->noContent();
    }
}
