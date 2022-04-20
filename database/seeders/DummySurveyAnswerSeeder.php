<?php

namespace Database\Seeders;

use App\Actions\CalculateSurveyResult;
use App\Models\Answer;
use App\Models\NpsScore;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummySurveyAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Question[] */
        $questions = Question::with(['options'])->get();

        if (config('app.env') !== 'local') {
            $user = User::firstOrCreate([
                'name'         => 'Jon Snow',
                'phone_number' => '85715152266',
                'birth_date'   => now()->subYears(25)->toDateString(),
                'gender'       => 'male',
                'email'        => 'jonsnow@gmail.com',
                'password'     => Hash::make('password'),
            ]);
        } else {
            $user = User::factory()->create(['created_at' => today()->subDays(7)]);
        }

        $survey = Survey::create([
            'user_id' => $user->id,
            // 'created_at' => today()->subDay(),

            'name' => $user->name,
            // 'phone_number',
            'birth_date' => $user->birth_date,
            // 'photo',
            'email' => $user->email,
            // 'result',
        ]);

        foreach ($questions as $question) {
            $randomOption = mt_rand(0, 3);
            $option = $question->options[$randomOption];

            Answer::create([
                'user_id' => $user->id,
                'option_id' => $option->id,
                'survey_id' => $survey->id,

                'score' => $option->score,
            ]);
        }

        NpsScore::factory()->create([
            'survey_id' => $survey->id,
            'user_id'   => $user->id,
        ]);

        CalculateSurveyResult::run($survey);
    }
}
