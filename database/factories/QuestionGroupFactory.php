<?php

namespace Database\Factories;

use App\Models\QuestionGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionGroupFactory extends Factory
{
    protected $model = QuestionGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName(),
        ];
    }
}
