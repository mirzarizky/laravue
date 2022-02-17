<?php

namespace Database\Factories;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Spatie\Url\Url;

class SurveyFactory extends Factory
{
    protected $model = Survey::class;
    protected $types = [
        'SFML', 'SFMC', 'SIML', 'SIMC',
        'SFDL', 'SFDC', 'SIDL', 'SIDC',
        'GFML', 'GFMC', 'GIML', 'GIMC',
        'GFDL', 'GFDC', 'GIDL', 'GIDC',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),

            'name'         => $this->faker->name(),
            'phone_number' => $this->faker->e164PhoneNumber(),
            'photo'        => $this->faker->randomElement([null, $this->saveImageFromUrl()]),
            'email'        => $this->faker->safeEmail(),
            'result'       => $this->faker->randomElement($this->types),
        ];
    }

    public function saveImageFromUrl()
    {
        if (config('app.env') == 'testing') {
            return null;
        }

        $parsedUrl = Url::fromString($url = $this->faker->imageUrl());
        $imageContent = file_get_contents($url);
        $imagePath = 'selfie/'. $parsedUrl->getLastSegment() .'_'. $parsedUrl->getFirstSegment();

        Storage::disk('public')->put($imagePath, $imageContent);

        return $imagePath;
    }
}
