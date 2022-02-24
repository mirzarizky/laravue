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

        $formattedFromDate = $this->parseDate($from);
        $formattedToDate = $this->parseDate($to);

        if (!$formattedFromDate && !$formattedToDate) {
            return $query;
        };

        if ($formattedFromDate) {
            $query = $query->whereDate($property, '>=', $from);
        }

        if ($formattedToDate) {
            $query = $query->whereDate($property, '<=', $to);
        }

        return $query;
    }

    private function parseDate(string $date)
    {
        try {
            return Carbon::createFromFormat('Y-m-d', $date);
        } catch (\Exception $e) {
            return false;
        }
    }
}
