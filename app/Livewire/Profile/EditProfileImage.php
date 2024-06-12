<?php

namespace App\Livewire\Profile;

use App\Utility\FileUploadUtility;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfileImage extends Component
{
    use LivewireAlert, WithFileUploads;

    #[Validate(['profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'])]
    public $profile_image;

    public function render()
    {
        $data = [
            'page_title' => 'Profile Picture',
        ];
        return view('livewire.profile.edit-profile-image', $data)->layout('layouts.app');
    }

    public function save()
    {
        $validated = $this->validate();
        if (isset($validated['profile_image']) && $validated['profile_image']) {
            $uploaded_file = FileUploadUtility::fileUploadLivewireRequest($validated['profile_image'], "profile_image/" . auth()->user()->id);
            auth()->user()->update(['profile_image' => $uploaded_file]);
            $this->alert('success', 'Profile Image updated successfully!');
            return redirect(request()->header('Referer'));
        }
    }
}
