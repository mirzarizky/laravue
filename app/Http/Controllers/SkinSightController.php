<?php

namespace App\Http\Controllers;

use App\Actions\GetSkinSightQuiz;
use App\Http\Requests\SkinSightRequest;
use App\Http\Resources\SkinsightQuizResource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SkinSightController extends Controller
{
    public function index()
    {
        return Inertia::render('Skinsight', [
            'quizzes' =>  Inertia::lazy(
                fn () => SkinsightQuizResource::collection(GetSkinSightQuiz::make()->handle())
            )
        ]);
    }

    public function store(SkinSightRequest $request)
    {
        dd($request->all());
    }
}
