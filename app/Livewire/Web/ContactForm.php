<?php

namespace App\Livewire\Web;

use App\Models\ContactMessage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{
    use LivewireAlert;

    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|numeric|digits:10')]
    public $phone;
    #[Validate('required|min:3')]
    public $message;

    public function render()
    {
        return view('livewire.web.contact-form');
    }

    public function save(): void
    {
        $validated = $this->validate();
        ContactMessage::create($validated);
        $this->alert('success', 'Saved Successfully.');
        $this->reset();
    }
}
