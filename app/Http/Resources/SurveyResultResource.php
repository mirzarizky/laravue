<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid'        => $this->uuid,
            'result'      => $this->result,
            'formula_url' => $this->formula_url,
            'photo_url'   => $this->photo_url,
            'user'        => UserResource::make($this->whenLoaded('user')),
            'created_at'  => $this->created_at,
            'nps_score'   => NpsScoreResource::make($this->whenLoaded('npsScore')),
            'answers'     => SkinSightAnswerCollection::collection($this->whenLoaded('answers')),
        ];
    }
}
