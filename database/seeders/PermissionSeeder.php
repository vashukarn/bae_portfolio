<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'blog_category.list',
            'blog_category.create_update',
            'blog_category.delete',
            'blog_category.change_status',
            'blog_category.list',
            'blog_category.create_update',
            'blog_category.delete',
            'blog_category.change_status',
            'blog_tag.list',
            'blog_tag.create_update',
            'blog_tag.delete',
            'blog_tag.change_status',
            'blogs.list',
            'blogs.create_update',
            'blogs.delete',
            'blogs.change_status',
            'blogs.index_page',
            'role.list',
            'role.create_update',
            'role.delete',
            'role.edit_permission',
            'user.list',
            'user.change_status',
            'user.delete',
            'subscriptions.list',
            'contact_form.list',
        ];
        foreach ($permissions as $permission) {
            $existing_permission = Permission::where('name', $permission)->first();
            if (!$existing_permission) {
                Permission::create([
                    'name' => $permission,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}
