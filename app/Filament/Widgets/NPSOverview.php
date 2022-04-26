<?php

namespace App\Filament\Widgets;

use App\Actions\CalculateNPSScore;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class NPSOverview extends StatsOverviewWidget
{
    protected static ?string $pollingInterval = null;

    public function getCards(): array
    {
        $npsScore =  (new CalculateNPSScore())->handle();

        return [
            Card::make('Net Promoter Score', number_format($npsScore->getScore(), 2) . '%')
                ->description("{$npsScore->total} Respondents"),
        ];
    }

    protected function getClassColor($score)
    {
        if (!$score) {
            return 'danger';
        }

        if ($score <= 0 && $score <= 50) {
            return 'danger';
        } elseif ($score > 50 && $score <= 70) {
            return 'warning';
        } elseif ($score > 70) {
            return 'success';
        } else {
            return '';
        }
    }
}
