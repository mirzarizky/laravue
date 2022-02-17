<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\QuestionOption;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'   => User::factory(),
            'option_id' => QuestionOption::factory(),
            'survey_id' => Survey::factory(),

            'score'       => $this->faker->randomElement([-2,-1,1,2]),
        ];
    }
}
