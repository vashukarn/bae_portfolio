<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $roles = [
            [
                'name' => 'Super Admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Staff',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Author',
                'guard_name' => 'web',
            ],
            [
                'name' => 'User',
                'guard_name' => 'web',
            ],
        ];
        Role::insert($roles);
    }
}
