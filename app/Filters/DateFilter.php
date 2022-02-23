<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class DateFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        if (is_array($value)) {
            return $this->dateBetween($query, $property, $value);
        }

        return match ($value) {
            '1d' => $query->whereDate($property, Carbon::today()),
            '7d' => $query->whereDate(
                $property,
                '>=',
                now()->startOfDay()->subWeek()->toDateString()
            )->whereDate(
                $property,
                '<=',
                now()->endOfDay()->toDateString()
            ),
            '30d' => $query->whereDate(
                $property,
                '>=',
                now()->startOfDay()->subMonth()->toDateString()
            )->whereDate(
                $property,
                '<=',
                now()->endOfDay()->toDateString()
            ),
            default => $query->whereDate($property, Carbon::today()),
        };
    }

    private function dateBetween($query, $property, array $dates)
    {
        list($from, $to) = $dates;

        return $query->whereDate(
            $property,
            '>=',
            $from
        )->whereDate(
            $property,
            '<=',
            $to
        );
    }
}
