<?php

namespace App\Livewire\CMS;

use App\Models\Subscription;
use Livewire\Component;
use Livewire\WithPagination;

class SubscriptionList extends Component
{
    use WithPagination;

    public function render()
    {
        $subscription = Subscription::latest('id')->paginate(20);
        $data = [
            'page_title' => 'Subscription',
            'data' => $subscription,
        ];
        return view('livewire.c-m-s.subscription-list', $data)->layout('layouts.app');
    }
}
