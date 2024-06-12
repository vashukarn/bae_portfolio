<?php

namespace App\Livewire\CMS;

use App\Models\CMS\Blog;
use App\Models\CMS\BlogCategory;
use App\Models\JsonSetting;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use JsonException;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPageBlog extends Component
{
    public $carousel_blogs;
    use WithPagination, LivewireAlert;

    public function render()
    {
        $blogs = Blog::with(['tags'])->where('status', 1)->latest('id')->get();
        $blog_categories = BlogCategory::pluck('title', 'id')->toArray();
        $vars = JsonSetting::groupBy('key')->pluck('key')->toArray();
        $previous_values = [];
        foreach ($vars as $var) {
            $previous_values[$var] = JsonSetting::where('key', $var)->pluck('value')->toArray();
        }
        $data = [
            'page_title' => 'Index Page Blogs',
            'blogs' => $blogs,
            'categories' => $blog_categories,
            'previous_values' => $previous_values,
        ];
        return view('livewire.c-m-s.index-page-blog', $data)->layout('layouts.app');
    }

    public function setBlog($blog_id, $key): void
    {
        $existing_removal = JsonSetting::where('key', $key)->where('value', $blog_id)->delete();
        if (!$existing_removal) {
            JsonSetting::create([
                'key' => $key,
                'value' => $blog_id,
            ]);
        }
        $this->alert('success', Str::title(Str::replace('_', ' ', $key)) . ' Updated Successfully.');
    }
}
