<?php

namespace Tests\Unit;

use App\Actions\CountRegisteredUsers;
use App\Models\User;
use Tests\TestCase;

class CountRegisteredUsersTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_count_registered_users()
    {
        $yesterday = 50;
        $today = 10;
        $thisWeek = $today + $yesterday;
        $lastMonth = $thisWeek * 4;
        $total = $yesterday + $today + $thisWeek + $lastMonth;

        User::factory()->count($today)->create();
        User::factory()->count($yesterday)
            ->create(['created_at' => now()->startOfDay()->yesterday()->toDateString()]);
        User::factory()->count($thisWeek)
            ->create(['created_at' => now()->startOfDay()->subWeek()->toDateString()]);
        User::factory()->count($lastMonth)
            ->create(['created_at' => now()->startOfDay()->subMonth()->toDateString()]);

        $countAll = (new CountRegisteredUsers())->handle();
        $countToday = (new CountRegisteredUsers())->handle('1d');
        $countWeek = (new CountRegisteredUsers())->handle('7d');
        $countMonth = (new CountRegisteredUsers())->handle('30d');

        $this->assertEquals($total, $countAll);
        $this->assertEquals($today, $countToday);
        $this->assertEquals($thisWeek + $yesterday + $today, $countWeek);
        $this->assertEquals($total, $countMonth);
    }
}
