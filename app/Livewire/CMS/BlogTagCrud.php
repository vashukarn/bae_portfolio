<?php

namespace App\Livewire\CMS;

use App\Models\CMS\BlogCategory;
use App\Models\CMS\BlogTag;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class BlogTagCrud extends Component
{
    use WithPagination, LivewireAlert;

    public $blog_tag = [];

    public function render()
    {
        $blog_tags = BlogTag::latest('id')->paginate(10);
        $data = [
            'page_title' => 'Blog Tag',
            'data' => $blog_tags,
        ];
        return view('livewire.c-m-s.blog-tag-crud', $data)->layout('layouts.app');
    }

    public function changeStatus($id): void
    {
        $blog_tag = BlogTag::findOrFail($id);
        $blog_tag->status = !$blog_tag->status;
        $blog_tag->save();
        $this->alert('success', 'Blog Tags Modified Successfully!');
    }

    public function editItem($id): void
    {
        $blog_tag = BlogTag::findOrFail($id);
        $this->blog_tag = $blog_tag->toArray();
    }

    public function rules(): array
    {
        return [
            'blog_tag.title' => 'required|min:1|string|max:190',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        $blog_tag = $validated['blog_tag'];
        BlogTag::updateOrCreate([
            'id' => @$this->blog_tag['id'],
        ], $blog_tag);
        $this->reset();
        $this->alert('success', 'Blog Tags Modified Successfully!');
    }
}
