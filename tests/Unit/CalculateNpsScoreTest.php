<?php

namespace Tests\Unit;

use App\Actions\CalculateNPSScore;
use App\Models\NpsScore;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalculateNpsScoreTest extends TestCase
{
    /** @test */
    public function it_calculate_nps_score()
    {
        // passives
        NpsScore::factory()->count(20)->create(['score' => 7]);
        // promoters
        NpsScore::factory()->count(50)->create(['score' => 10]);
        // dectrators
        NpsScore::factory()->count(30)->create(['score' => 5]);

        $npsScore = (new CalculateNPSScore())->handle();

        $this->assertEquals($npsScore->getScore(), 20.0);
    }
}
