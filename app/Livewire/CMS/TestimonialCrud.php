<?php

namespace App\Livewire\CMS;

use App\Models\CMS\Testimonials;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class TestimonialCrud extends Component
{
    use WithPagination, LivewireAlert;

    public $recommendation = [];

    public function render()
    {
        $recommendations = Testimonials::latest('id')->paginate(10);
        $data = [
            'page_title' => 'Recommendation',
            'data' => $recommendations,
        ];
        return view('livewire.c-m-s.testimonial-crud', $data)->layout('layouts.app');
    }

    public function changeStatus($id): void
    {
        $recommendation = Testimonials::findOrFail($id);
        $recommendation->status = !$recommendation->status;
        $recommendation->save();
        $this->alert('success', 'Recommendations Modified Successfully!');
    }

    public function editItem($id): void
    {
        $recommendation = Testimonials::findOrFail($id);
        $this->recommendation = $recommendation->toArray();
    }

    public function rules(): array
    {
        return [
            'recommendation.name' => 'required|min:1|string|max:190',
            'recommendation.designation' => 'required|min:1|string|max:190',
            'recommendation.content' => 'required|min:1|string|max:190',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        $recommendation = $validated['recommendation'];
        Testimonials::updateOrCreate([
            'id' => @$this->recommendation['id'],
        ], $recommendation);
        $this->reset();
        $this->alert('success', 'Recommendations Modified Successfully!');
    }
}
