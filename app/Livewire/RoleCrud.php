<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleCrud extends Component
{
    use WithPagination, LivewireAlert;

    public $role = [];

    public function render()
    {
        $roles = Role::latest('id')->paginate(10);
        $data = [
            'page_title' => 'Roles',
            'data' => $roles
        ];
        return view('livewire.role-crud', $data)->layout('layouts.app');
    }

    public function editItem($id): void
    {
        $role = Role::findOrFail($id);
        $this->role = $role->toArray();
    }

    public function rules(): array
    {
        return [
            'role.name' => 'required|min:5|string|max:190',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        $role = $validated['role'];
        Role::updateOrCreate([
            'id' => @$this->role['id']
        ], $role);
        $this->reset();
        $this->alert('success', 'Game Added Successfully!');
    }
}
