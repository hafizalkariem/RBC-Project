<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'Full access to all features'
        ]);

        Role::create([
            'name' => 'developer',
            'display_name' => 'Developer',
            'description' => 'Access to development features'
        ]);

        Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Regular user access'
        ]);
    }
}