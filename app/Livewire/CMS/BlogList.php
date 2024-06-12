<?php

namespace App\Livewire\CMS;

use App\Models\CMS\Blog;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination, LivewireAlert;

    public function render()
    {
        $blogs = Blog::whereHas('category')->with(['tags', 'category'])->orderBy('priority', 'DESC')->paginate(10);
        $data = [
            'page_title' => 'Blogs',
            'data' => $blogs,
        ];
        return view('livewire.c-m-s.blog-list', $data)->layout('layouts.app');
    }

    public function changeStatus($id): void
    {
        $blog = Blog::findOrFail($id);
        $blog->status = !$blog->status;
        $blog->save();
    }

    public function deleteBlog($id): void
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
    }
}
