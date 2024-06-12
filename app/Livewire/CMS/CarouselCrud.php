<?php

namespace App\Livewire\CMS;

use App\Models\CMS\Carousel;
use App\Utility\FileUploadUtility;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CarouselCrud extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $carousel = [];

    public function render()
    {
        $carousels = Carousel::latest('id')->paginate(10);
        $data = [
            'page_title' => 'Carousel',
            'data' => $carousels
        ];
        return view('livewire.c-m-s.carousel-crud', $data)->layout('layouts.app');
    }

    public function changeStatus($id): void
    {
        $carousel = Carousel::findOrFail($id);
        $carousel->status = !$carousel->status;
        $carousel->save();
        if ($carousel->status) {
            Carousel::where('id', '!=', $id)->update(['status' => false]);
        }
        $this->alert('success', 'Carousel Modified Successfully!');
    }

    public function editItem($id): void
    {
        $carousel = Carousel::findOrFail($id);
        $this->carousel = $carousel->toArray();
    }

    public function rules(): array
    {
        return [
            'carousel.title' => 'required|min:3|string|max:190',
            'carousel.sub_title' => 'nullable|string',
            'carousel.redirect_url' => 'nullable|string',
            'carousel.image' => 'nullable|max:1024',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        $carousel = $validated['carousel'];
        if (isset($carousel['image']) && $carousel['image'] && !is_string($carousel['image'])) {
            $uploaded_file = FileUploadUtility::fileUploadLivewireRequest($carousel['image'], 'blog-category');
            $carousel['image'] = $uploaded_file;
        }
        Carousel::updateOrCreate([
            'id' => @$this->carousel['id']
        ], $carousel);
        $this->alert('success', 'Carousel Modified Successfully!');
        return redirect(request()?->header('Referer'));
    }
}
