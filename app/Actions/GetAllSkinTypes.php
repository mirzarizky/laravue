<?php

namespace App\Actions;

use App\Models\SkinType;
use Illuminate\Support\Facades\Cache;
use Lorisleiva\Actions\Concerns\AsAction;

class GetAllSkinTypes
{
    use AsAction;

    public function handle()
    {
        return Cache::rememberForever(
            SkinType::CACHE_KEY_ALL,
            fn () => SkinType::query()->get(['name', 'id'])
        );
    }
}
