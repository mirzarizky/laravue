<?php

namespace App\Actions;

use App\Models\User;
use Carbon\Carbon;
use Lorisleiva\Actions\Concerns\AsAction;

class CountRegisteredUsers
{
    use AsAction;

    public function handle(string $filterBy = null): int
    {
        return User::query()
            ->when(
                $filterBy,
                function ($query, $filterBy) {
                    return match ($filterBy) {
                        '1d' => $query->whereDate('created_at', Carbon::today()),
                        '7d' => $query->whereDate(
                            'created_at',
                            '>=',
                            now()->startOfDay()->subWeek()->toDateString()
                        )->whereDate(
                            'created_at',
                            '<=',
                            now()->endOfDay()->toDateString()
                        ),
                        '30d' => $query->whereDate(
                            'created_at',
                            '>=',
                            now()->startOfDay()->subMonth()->toDateString()
                        )->whereDate(
                            'created_at',
                            '<=',
                            now()->endOfDay()->toDateString()
                        ),
                        default => $query
                    };
                }
            )
            ->count();
    }
}
