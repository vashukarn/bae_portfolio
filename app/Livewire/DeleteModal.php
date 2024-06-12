<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DeleteModal extends Component
{
    use LivewireAlert;

    public $modelItem;
    protected $listeners = [
        'destroy',
        'disable'
    ];

    public function mount($modelItem): void
    {
        $this->modelItem = $modelItem;
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }

    public function deleteModal(): void
    {
        $disable_option = in_array('status', $this->modelItem->getFillable(), true);
        $options = [
            'toast' => false,
            'position' => 'center',
            'timer' => null,
            'showDenyButton' => true,
            'denyButtonText' => 'Delete',
            'onDenied' => 'destroy',
        ];
        if ($disable_option && $this->modelItem->status === 1) {
            $options = array_merge($options, [
                'showConfirmButton' => true,
                'confirmButtonText' => 'Disable',
                'onConfirmed' => 'disable',
            ]);
        }
        $this->alert('info', 'Are you sure you want to delete this? This might delete all associated relations', $options);
    }

    public function destroy()
    {
        $this->modelItem->delete();
        return redirect(request()?->header('Referer'));
    }

    public function disable()
    {
        $this->modelItem->status = false;
        $this->modelItem->save();
        return redirect(request()?->header('Referer'));
    }
}
