<?php

namespace App\Http\Controllers;

use App\Filters\DateFilter;
use App\Http\Resources\SurveyResultCollection;
use App\Models\Survey;
use App\Sorts\UserNameSort;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        if (($perPage = $request->query('perPage', 10)) > 50) {
            $perPage = 10;
        }

        $query = Survey::query()->with(['user']);

        $surveys = QueryBuilder::for($query)
            ->allowedFilters([
                AllowedFilter::custom('created_at', new DateFilter())->default('1d')
            ])
            ->allowedSorts([
                'created_at',
                'result',
                AllowedSort::custom('user_name', new UserNameSort())
            ])
            ->defaultSort('-created_at')
            ->paginate($perPage)
            ->withQueryString();

        $collections = SurveyResultCollection::collection($surveys);

        return Inertia::render('Admin/Survey/Index', [
            'surveys' => fn () => $collections,
            'query'   => fn () => $request->only([ 'perPage', 'sort', 'filter'])
        ]);
    }
}
