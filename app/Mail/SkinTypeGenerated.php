<?php

namespace App\Mail;

use App\Models\SkinType;
use App\Models\Survey;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SkinTypeGenerated extends Mailable
{
    use Queueable;
    use SerializesModels;

    public string $imageUrl;
    public string $formulaUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Survey $survey, public SkinType $skinType)
    {
        $this->imageUrl = $skinType->image_asset_url;
        $this->formulaUrl = config('app.frontend_url'). '/formula/'.$survey->uuid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("WAW! Ternyata ini hasil SkinSight kamu...")
            ->markdown('emails.skintypes.teaser', [
                'skintype' => $this->skinType,
                'formulaUrl' => $this->formulaUrl,
            ]);
    }
}
