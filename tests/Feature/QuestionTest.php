<?php

namespace Tests\Feature;

use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    /** @test */
    public function admin_can_view_list_of_question()
    {
        $response = $this->actingAsAdmin()
            ->get(route('admin.quiz.index'));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_view_edit_page()
    {
        $question = Question::query()->inRandomOrder()->first();

        $response = $this->actingAsAdmin()
            ->get(route('admin.quiz.edit', $question));

        $response->assertOk()
            ->assertSessionHasNoErrors();
    }

    /** @test */
    public function admin_can_update_question()
    {
        $question = Question::query()->inRandomOrder()->first();

        $response = $this->actingAsAdmin()
            ->put(route('admin.quiz.update', $question), [
                'question_text' => $question->question_text,
                'options' => $question->options
                    ->map(fn ($option) => ['id' => $option->id, 'option_text' => $option->option_text])
                    ->toArray()
            ]);

        $response->assertRedirect()
            ->assertSessionHasNoErrors();
    }

    /** @test */
    public function admin_can_delete_existing_question_image()
    {
        Storage::fake(config('media-library.disk_name'));

        /** @var Question */
        $question = Question::query()->inRandomOrder()->first();
        $question->addMedia(UploadedFile::fake()->image('fake-image.jpg'))->toMediaCollection(Question::QUESTION_IMAGE_COLLECTION_KEY);

        $questionImage = $question->questionImage;
        $this->assertTrue(!!$questionImage);
        $response = $this->actingAsAdmin()
            ->postJson(route('admin.quiz.delete_image', $question));

        $response->assertNoContent();
        $this->assertModelMissing($questionImage);
    }

    /** @test */
    public function upload_image_will_delete_existing_image()
    {
        Storage::fake(config('media-library.disk_name'));

        /** @var Question */
        $question = Question::query()->inRandomOrder()->first();
        $question->addMedia(UploadedFile::fake()->image('fake-image.jpg'))->toMediaCollection(Question::QUESTION_IMAGE_COLLECTION_KEY);

        $currentQuestionImage = $question->questionImage;
        $this->assertTrue(!!$currentQuestionImage);

        $response = $this->actingAsAdmin()
            ->put(route('admin.quiz.update', $question), [
                'question_text' => $question->question_text,
                'options' => $question->options
                    ->map(fn ($option) => ['id' => $option->id, 'option_text' => $option->option_text])
                    ->toArray(),
                'question_image' => UploadedFile::fake()->image('new-fake-image.jpg')
            ]);

        $response->assertRedirect()
            ->assertSessionHasNoErrors();
        $this->assertModelMissing($currentQuestionImage);
    }
}
