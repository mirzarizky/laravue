<?php

namespace Database\Factories;

use App\Models\NpsScore;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NpsScoreFactory extends Factory
{
    protected $model = NpsScore::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'   => User::factory(),
            'survey_id' => Survey::factory(),

            'score'    => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'verbatim' => $this->faker->sentence(),
        ];
    }
}
