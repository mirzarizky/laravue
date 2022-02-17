<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DefaultRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultRoles = ['superadmin', 'admin'];

        foreach ($defaultRoles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
