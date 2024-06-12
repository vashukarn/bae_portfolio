<?php

namespace App\Livewire\Web;

use App\Models\ContactMessage;
use App\Models\Subscription;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SubscriptionForm extends Component
{
    use LivewireAlert;

    #[Validate('required|email|unique:subscriptions,email')]
    public $email;

    public function render()
    {
        return view('livewire.web.subscription-form');
    }

    public function save()
    {
        $validated = $this->validate();
        Subscription::create($validated);
        $this->alert('success', 'Subscription Successfully.');
        $this->reset();
        return view('livewire.web.subscription-form');
    }
}
