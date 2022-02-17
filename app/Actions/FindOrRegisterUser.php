<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class FindOrRegisterUser
{
    use AsAction;

    public function handle(array $data): User
    {
        return User::firstOrCreate(
            ['email' => $data['email']],
            [
                'name'         => $data['name'],
                'phone_number' => $data['phone_number'] ?? null,
                'gender'       => $data['gender'] ?? null,
                'birth_date'   => $data['birth_date'] ?? null,
                'password'     => Hash::make($data['password'])
            ]
        );
    }
}
