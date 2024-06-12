<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(BusinessSettingSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SocialSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BlogSeeder::class);
    }
}
