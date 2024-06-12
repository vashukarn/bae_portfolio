<?php

namespace App\Livewire\CMS;

use App\Models\CMS\BlogCategory;
use App\Utility\FileUploadUtility;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BlogCategoryCrud extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;

    public $blog_category = [];

    public function render()
    {
        $blog_categories = BlogCategory::latest('id')->paginate(10);
        $data = [
            'page_title' => 'Blog Category',
            'data' => $blog_categories
        ];
        return view('livewire.c-m-s.blog-category-crud', $data)->layout('layouts.app');
    }

    public function changeStatus($id): void
    {
        $blog_category = BlogCategory::findOrFail($id);
        $blog_category->status = !$blog_category->status;
        $blog_category->save();
        $this->alert('success', 'Blog Categories Modified Successfully!');
    }

    public function editItem($id): void
    {
        $blog_category = BlogCategory::findOrFail($id);
        $this->blog_category = $blog_category->toArray();
    }

    public function rules(): array
    {
        return [
            'blog_category.title' => 'required|min:3|string|max:190|unique:blog_categories,title,' . @$this->blog_category['id'],
            'blog_category.short_description' => 'nullable|string',
            'blog_category.parent_id' => 'nullable|exists:blog_categories,id',
            'blog_category.banner' => 'nullable|max:1024',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        $blog_category = $validated['blog_category'];
        if (isset($blog_category['banner']) && $blog_category['banner'] && !is_string($blog_category['banner'])) {
            $uploaded_file = FileUploadUtility::fileUploadLivewireRequest($blog_category['banner'], 'blog-category');
            $blog_category['banner'] = $uploaded_file;
        }
        BlogCategory::updateOrCreate([
            'id' => @$this->blog_category['id']
        ], $blog_category);
        $this->alert('success', 'Blog Categories Modified Successfully!');
        return redirect(request()?->header('Referer'));
    }
}
