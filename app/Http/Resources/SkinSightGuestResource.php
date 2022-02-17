<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkinSightGuestResource extends JsonResource
{
    protected ?string $accessToken = null;

    public function withAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'survey' => [
                'uuid' => $this->uuid
            ],
            'auth' => $this->when((bool) $this->accessToken, function () {
                return (new LoginResource($this->whenLoaded('user')))
                    ->withAccessToken($this->accessToken);
            }),
            // 'access_token' => $this->when(
            //     (bool) $this->accessToken,
            //     $this->accessToken
            // )
        ];
    }
}
