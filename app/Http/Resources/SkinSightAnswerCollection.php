<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkinSightAnswerCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'option_id' => $this->option_id,
            'survey_id' => $this->survey_id,

            'score'    => $this->score,
            'question' => SkinsightQuizResource::make($this->whenLoaded('question'))
        ];
    }
}
