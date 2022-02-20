<?php

namespace App\Actions;

use App\Models\Question;
use Illuminate\Support\Facades\Cache;
use Lorisleiva\Actions\Concerns\AsAction;

class GetSkinSightQuiz
{
    use AsAction;

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]|mixed
     */
    public function handle()
    {
        return Cache::remember(
            Question::CACHE_KEY_QUIZ,
            now()->addHour(),
            function () {
                return Question::query()
                    ->with(['options:id,question_id,option_text'])
                    ->get();
            }
        );
    }
}
