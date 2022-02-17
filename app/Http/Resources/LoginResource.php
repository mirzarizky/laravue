<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    protected string $accessToken;

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
            'name'         => $this->name,
            'email'        => $this->email,
            'birth_date'   => $this->birth_date,
            'gender'       => $this->gender,
            'access_token' => $this->accessToken ?? $this->generateAccessToken($request->user())
        ];
    }

    protected function generateAccessToken(User $user): string
    {
        $accessToken = $user->createToken('Login Access')->plainTextToken;

        return $accessToken;
    }
}
