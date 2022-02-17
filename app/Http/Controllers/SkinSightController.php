<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkinsightQuizResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SkinSightController extends Controller
{
    public function index()
    {
        $questions = Cache::remember(
            'skinsight-quiz',
            now()->addHour(),
            function () {
                return Question::query()
                    ->with(['options:id,question_id,option_text'])
                    ->get();
            }
        );

        return response()
            ->json(SkinsightQuizResource::collection($questions));
    }
}
