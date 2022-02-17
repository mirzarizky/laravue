<?php

namespace App\Actions;

use App\Models\NpsScore;
use App\Objects\TotalNpsScoreObject;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateNPSScore
{
    use AsAction;

    public function handle(): TotalNpsScoreObject
    {
        $total = NpsScore::count();
        $passives = NpsScore::whereIn('score', [7,8])->count();
        $promoters = NpsScore::whereIn('score', [9,10])->count();
        $detractors = NpsScore::whereIn('score', [1,2,3,4,5,6])->count();

        $score = new TotalNpsScoreObject(
            total: $total,
            passives: $passives,
            promoters: $promoters,
            detractors: $detractors
        );

        return $score;
    }
}
