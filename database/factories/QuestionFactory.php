<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\QuestionGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_id'      => QuestionGroup::factory(),
            'question_text' => $this->faker->sentence() . '?',
        ];
    }
}
