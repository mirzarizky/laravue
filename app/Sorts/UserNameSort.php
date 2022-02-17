<?php

namespace App\Sorts;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class UserNameSort implements Sort
{
    public function __invoke(Builder $query, bool $descending, string $column)
    {
        $direction = $descending ? 'DESC' : 'ASC';

        $query->addSelect([$column => User::select('name')->whereColumn('id', 'surveys.user_id')])
            ->orderBy($column, $direction);
    }
}
