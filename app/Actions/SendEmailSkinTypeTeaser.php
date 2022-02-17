<?php

namespace App\Actions;

use App\Events\SurveyCompleted;
use App\Mail\SkinTypeGenerated;
use App\Models\SkinType;
use App\Models\Survey;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsFake;
use Lorisleiva\Actions\Concerns\AsListener;

class SendEmailSkinTypeTeaser
{
    use AsListener;
    use AsFake;

    public function handle(Survey $survey): void
    {
        $skinType = SkinType::whereName($survey->result)->first();
        $mailToSend = new SkinTypeGenerated($survey, $skinType);

        if ($skinType) {
            if ($survey->user()->exists()) {
                Mail::to($survey->user)->queue($mailToSend);
            } else {
                Mail::queue($mailToSend->to($survey->email, $survey->name));
            }
        }
    }

    public function asListener(SurveyCompleted $event): void
    {
        $this->handle($event->survey);
    }
}
