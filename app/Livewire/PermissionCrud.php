<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionCrud extends Component
{
    public int $role_id;

    public function mount($role_id): void
    {
        $this->role_id = $role_id;
    }

    public function render()
    {
        $role = Role::findOrFail($this->role_id);
        $permission_all = Permission::with(['roles'])->get();
        $permissions = [];
        foreach ($permission_all as $permission_item) {
            $permission = explode('.', $permission_item->name);
            if (isset($permission[1])) {
                $permissions[$this->titleFromColumnName($permission[0])][] = [
                    'id' => $permission_item->id,
                    'name' => $this->titleFromColumnName($permission[1]),
                    'permission_name' => $permission_item->name,
                    'has_permission' => $role->hasPermissionTo($permission_item),
                ];
            }
        }
        $data = [
            'page_title' => "Edit $role->name's Permission",
            'permissions' => $permissions
        ];
        return view('livewire.permission-crud', $data)->layout('layouts.app');
    }

    private function titleFromColumnName(string $column_string): string
    {
        $column_string = Str::title(Str::replace('_', ' ', $column_string));
        return Str::title(Str::replace('.', ' ', $column_string));
    }

    public function addPermission($permission_id): void
    {
        $role = Role::findOrFail($this->role_id);
        if ($role->hasPermissionTo($permission_id)) {
            $role->revokePermissionTo($permission_id);
        } else {
            $role->givePermissionTo($permission_id);
        }
    }
}
