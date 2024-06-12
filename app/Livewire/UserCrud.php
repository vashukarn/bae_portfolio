<?php

namespace App\Livewire;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class UserCrud extends Component
{
    use WithPagination, LivewireAlert;

    public $user = [];

    public function render()
    {
        $data = User::latest('id')->paginate(10);
        $data = [
            'page_title' => 'Users',
            'data' => $data
        ];
        return view('livewire.user-crud', $data)->layout('layouts.app');
    }

    public function changeStatus($id): void
    {
        $game = User::findOrFail($id);
        $game->status = !$game->status;
        $game->save();
    }
}
