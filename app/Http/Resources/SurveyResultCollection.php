<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResultCollection extends JsonResource
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
            'uuid'       => $this->uuid,
            'result'     => $this->result,
            'photo_url'  => $this->photo_url,
            'user'       => UserResource::make($this->whenLoaded('user')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
