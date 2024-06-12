<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditPassword extends Component
{
    use LivewireAlert;

    #[Validate]
    public $password;
    public $password_confirmation;


    public function rules(): array
    {
        return [
            'password' => 'required|confirmed|min:3|string|max:190',
        ];
    }

    public function render()
    {
        $data = [
            'page_title' => 'Change Password',
        ];
        return view('livewire.profile.edit-password', $data);
    }

    public function save()
    {
        $validated = $this->validate();
        $new_password = Hash::make($validated['password']);
        auth()->user()->update(['password' => $new_password]);
        $this->alert('success', 'Password updated successfully!');
    }
}
