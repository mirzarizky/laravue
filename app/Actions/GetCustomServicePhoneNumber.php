<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class GetCustomServicePhoneNumber
{
    use AsAction;

    public function handle()
    {
        return '6285782861488';
    }
}
