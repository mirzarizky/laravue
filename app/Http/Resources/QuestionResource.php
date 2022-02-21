<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                 => $this->id,
            'question_text'      => $this->question_text,
            'options'            => $this->whenLoaded('options'),
            'group'              => $this->whenLoaded('group'),
            'question_image_url' => $this->questionImage?->getUrl()
        ];
    }
}
