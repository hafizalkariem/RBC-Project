<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        $developerRole = Role::where('name', 'developer')->first();
        $adminRole = Role::where('name', 'admin')->first();

        // User ID 1 = Developer
        $user1 = User::find(1);
        if ($user1) {
            $user1->roles()->attach($developerRole->id);
        }

        // User ID 2 = Admin
        $user2 = User::find(2);
        if ($user2) {
            $user2->roles()->attach($adminRole->id);
        }
    }
}