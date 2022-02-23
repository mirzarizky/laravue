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
        $search = $request->query('s');

        $query = Survey::query()
            ->with(['user'])
            ->when(
                $search,
                fn ($query, $search) =>  $query->search(['user.name', 'user.email'], $search)
            );

        $surveys = QueryBuilder::for($query)
            ->allowedFilters([
                AllowedFilter::custom('created_at', new DateFilter())
            ])
            ->allowedSorts([
                'created_at',
                'result',
                AllowedSort::custom('user', new UserNameSort(), 'user_name')
            ])
            ->defaultSort('-created_at')
            ->paginate($perPage)
            ->withQueryString();

        $collections = SurveyResultCollection::collection($surveys);

        return Inertia::render('Admin/Survey/Index', [
            'surveys' => $collections,
            'query'   => $request->only(['s', 'perPage', 'sort'])
        ]);
    }
}
