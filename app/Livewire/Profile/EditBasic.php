<?php

namespace App\Livewire\Profile;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditBasic extends Component
{
    use LivewireAlert;

    #[Validate]
    public $user;


    public function rules(): array
    {
        return [
            'user.name' => 'required|min:3|string|max:190',
            'user.username' => 'required|min:3|string|max:190|unique:users,username,' . $this->user['id'],
            'user.email' => 'required|email|unique:users,email,' . $this->user['id'],
            'user.phone' => 'nullable|numeric|digits:10|unique:users,phone,' . $this->user['id'],
        ];
    }
    public function mount()
    {
        $this->user = auth()->user()->toArray();
    }

    public function render()
    {
        $data = [
            'page_title' => 'Basic Information',
        ];
        return view('livewire.profile.edit-basic', $data)->layout('layouts.app');
    }
    public function save()
    {
        $validated = $this->validate();
        auth()->user()->update($validated['user']);
        $this->alert('success', 'Profile updated successfully!');
    }
}
