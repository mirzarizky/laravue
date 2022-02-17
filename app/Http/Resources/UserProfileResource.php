<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
            'name'              => $this->name,
            'email'             => $this->email,
            'phone_number'      => $this->phone_number,
            'email_verified_at' => $this->email_verified_at,
            'birth_date'        => $this->birth_date,
            'gender'            => $this->gender,
        ];
    }
}
