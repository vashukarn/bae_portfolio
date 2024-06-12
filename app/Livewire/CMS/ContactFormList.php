<?php

namespace App\Livewire\CMS;

use App\Models\ContactMessage;
use Livewire\Component;
use Livewire\WithPagination;

class ContactFormList extends Component
{
    use WithPagination;

    public function render()
    {
        $contact_forms = ContactMessage::latest('id')->paginate(20);
        $data = [
            'page_title' => 'Contact Forms',
            'data' => $contact_forms,
        ];
        return view('livewire.c-m-s.contact-form-list', $data)->layout('layouts.app');
    }
}
