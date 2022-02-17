<?php

namespace App\Actions;

use App\Events\SurveyCompleted;
use App\Models\QuestionGroup;
use App\Models\Survey;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateSurveyResult
{
    use AsAction;

    public function handle(Survey $survey)
    {
        $survey->load(['answers']);

        $groups = QuestionGroup::with(['options'])->get();

        if (!$survey->result) {
            $groups->each(function ($group) use ($survey) {
                $optionsByGroup = $group->options->pluck('id');
                $sumGroupScore = ($survey->answers)
                    ->whereIn('option_id', $optionsByGroup)
                    ->sum('score');

                $result = $group->max_value;

                if ($sumGroupScore < 0) {
                    $result = $group->min_value;
                }

                if ($sumGroupScore == 0) {
                    $answersByGroup = $survey->answers
                        ->whereIn('option_id', $optionsByGroup)
                        ->all();

                    foreach ($answersByGroup as $answer) {
                        if ($answer->score == -2) {
                            $result = $group->min_value;
                            break;
                        }

                        if ($answer->score == 2) {
                            $result = $group->max_value;
                            break;
                        }
                    }
                }

                // if ($sumGroupScore > 0) {

                // }

                $survey->update(['result' => $survey->result . Str::of($result)->substr(0, 1)]);
            });

            event(new SurveyCompleted(
                $survey,
                $this->isFirstTimeSurvey($survey)
            ));
        }
    }

    protected function isFirstTimeSurvey(Survey $survey): bool
    {
        $firstTime = true;

        if ($userId = $survey->user_id) {
            $countByUserId = Survey::query()->where('user_id', $userId)->count();

            if ($countByUserId > 1) {
                $firstTime = false;
            }
        }

        if (!$userId) {
            $countByEmail = Survey::query()->where('email', $survey->email)->count();

            if ($countByEmail > 1) {
                $firstTime = false;
            }
        }

        return $firstTime;
    }
}
