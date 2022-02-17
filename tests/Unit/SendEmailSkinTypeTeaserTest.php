<?php

namespace Tests\Unit;

use App\Actions\SendEmailSkinTypeTeaser;
use App\Mail\SkinTypeGenerated;
use App\Models\Survey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendEmailSkinTypeTeaserTest extends TestCase
{
    /** @test */
    public function action_class_exists()
    {
        $this->assertTrue(class_exists(SendEmailSkinTypeTeaser::class));
    }

    /** @test */
    public function it_sends_email()
    {
        Mail::fake();

        $survey = Survey::factory()->create();

        (new SendEmailSkinTypeTeaser())->handle($survey);

        Mail::assertQueued(SkinTypeGenerated::class);
    }
}
