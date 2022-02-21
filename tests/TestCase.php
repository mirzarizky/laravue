<?php

namespace Tests;

use Database\Factories\UserFactory;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use LazilyRefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // $this->withoutExceptionHandling();

        $this->seed(DatabaseSeeder::class);
    }

    public function actingAsAdmin()
    {
        /** @var \App\Models\User */
        $user = UserFactory::new()->create(['name' => 'admin']);
        $user->assignRole('admin');

        return $this->actingAs($user);
    }
}
