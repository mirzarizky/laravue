<?php

namespace App\Filament\Widgets;

use App\Models\Survey;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        $usersCount = User::query()->count();
        $skinSightCount = Survey::query()->count();

        $usersCountPastWeek = User::query()
            ->select([
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            ])
            ->whereDate('created_at', '>=', today()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count');

        $surveysCountPastWeek = Survey::query()
            ->select([
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            ])
            ->whereDate('created_at', '>=', today()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count');

        return [
            Card::make('Users', $usersCount)
                ->chart($usersCountPastWeek->all())
                ->color('primary'),
            Card::make('SkinSight', $skinSightCount)
                ->chart($surveysCountPastWeek->all())
                ->color('primary'),
        ];
    }
}
