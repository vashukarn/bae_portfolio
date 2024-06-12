<?php

namespace App\Livewire\Profile;

use App\Models\Social;
use App\Models\SocialLinks;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditSocialLinks extends Component
{
    use LivewireAlert;

    #[Validate]
    public $social_links = [];


    public function rules(): array
    {
        return [
            'social_links.*' => 'nullable|active_url',
        ];
    }

    public function mount(): void
    {
        foreach (auth()->user()->social_links as $social_link){
            $this->social_links[$social_link->social_id] = $social_link->link;
        }
    }

    public function render()
    {
        $socials = Social::all();
        $data = [
            'page_title' => 'Social Links',
            'socials' => $socials,
        ];
        return view('livewire.profile.edit-social-links', $data)->layout('layouts.app');
    }

    public function save(): void
    {
        $user = User::find(auth()->user()->id);
        $validated = $this->validate();
        $social_links = $validated['social_links'];
        foreach ($social_links as $social_id => $social_link) {
            if (isset($social_link) && $social_link !== '') {
                $existing_link = SocialLinks::where('social_id', $social_id)->where('entity_id', $user->id)->first();
                if (!$existing_link) {
                    $link = new SocialLinks([
                        'social_id' => $social_id,
                        'link' => $social_link,
                    ]);
                    $user->social_links()->save($link);
                } else {
                    $existing_link->update(['link' => $social_link]);
                }
                $this->alert('success', 'Social Link updated successfully!');
            }
        }
    }
}
