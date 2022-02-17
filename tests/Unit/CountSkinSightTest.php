<?php

namespace Tests\Unit;

use App\Actions\CountSkinSightTest as ActionsCountSkinSightTest;
use App\Models\Survey;
use Tests\TestCase;

class CountSkinSightTest extends TestCase
{
    /** @test */
    public function it_count_skin_sight_test()
    {
        $yesterday = 50;
        $today = 10;
        $thisWeek = $today + $yesterday;
        $lastMonth = $thisWeek * 4;
        $total = $yesterday + $today + $thisWeek + $lastMonth;

        Survey::factory()->count($today)->create();
        Survey::factory()->count($yesterday)
            ->create(['created_at' => now()->startOfDay()->yesterday()->toDateString()]);
        Survey::factory()->count($thisWeek)
            ->create(['created_at' => now()->startOfDay()->subWeek()->toDateString()]);
        Survey::factory()->count($lastMonth)
            ->create(['created_at' => now()->startOfDay()->subMonth()->toDateString()]);

        $countAll = (new ActionsCountSkinSightTest())->handle();
        $countToday = (new ActionsCountSkinSightTest())->handle('1d');
        $countWeek = (new ActionsCountSkinSightTest())->handle('7d');
        $countMonth = (new ActionsCountSkinSightTest())->handle('30d');

        $this->assertEquals($total, $countAll);
        $this->assertEquals($today, $countToday);
        $this->assertEquals($thisWeek + $yesterday + $today, $countWeek);
        $this->assertEquals($total, $countMonth);
    }
}
