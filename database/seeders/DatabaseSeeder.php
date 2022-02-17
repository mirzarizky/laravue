<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultRoleSeeder::class);
        $this->call(SkinSightSeeder::class);
        $this->call(SkinTypeSeeder::class);
    }
}
