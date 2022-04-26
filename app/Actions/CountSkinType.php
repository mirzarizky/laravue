<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class CountSkinType
{
    use AsAction;

    public function handle()
    {
        $allSkinType = GetAllSkinTypes::run();

        return $allSkinType->loadCount('surveys');
    }
}
