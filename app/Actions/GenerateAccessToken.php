<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GenerateAccessToken
{
    use AsAction;

    public function handle(User $user, $name = 'Login Access')
    {
        return $user->createToken($name)->plainTextToken;
    }
}
