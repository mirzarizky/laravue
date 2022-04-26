<?php

namespace App\Filament\Widgets;

use App\Actions\CountSkinType;
use App\Models\SkinType;
use Filament\Widgets\DoughnutChartWidget;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SkinTypeChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Skin Types';

    // public ?string $filter = 'today';

    // protected function getFilters(): ?array
    // {
    //     return [
    //         '1d' => 'Today',
    //         '7d' => 'Last week',
    //         '30d' => 'Last month',
    //         'year' => 'This year',
    //     ];
    // }

    protected function getData(): array
    {
        /** @var Collection|SkinType[] */
        $skinTypes = Cache::remember(
            SkinType::CACHE_KEY_COUNT,
            now()->addHour(),
            fn () => (new CountSkinType())->handle()
        );
        $totalCount = $skinTypes->sum('surveys_count');

        return [
            'datasets' => [
                [
                    'label' => 'Skin Types',
                    'data' => $skinTypes->map(fn ($skinType) => $skinType->surveys_count)
                ],
            ],
            'labels' => $skinTypes->map(fn ($skinType) => $skinType->name),
        ];
    }
}
