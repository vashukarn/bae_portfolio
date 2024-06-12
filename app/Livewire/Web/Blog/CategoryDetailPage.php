<?php

namespace App\Livewire\Web\Blog;

use App\Models\CMS\Blog;
use App\Models\CMS\BlogCategory;
use Livewire\Component;

class CategoryDetailPage extends Component
{
    public $slug;
    public int $per_page = 6;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $category = BlogCategory::with(['blogs'])->where('slug', $this->slug)->firstOrFail();
        $all_blogs = Blog::where('category_id', $category->id)->orderBy('priority', 'DESC')->paginate($this->per_page);
        $data = [
            'page_title' => $category->title,
            'category' => $category,
            'all_blogs' => $all_blogs,
        ];
        return view('livewire.web.blog.category-detail-page', $data);
    }

    public function loadMore(): void
    {
        $this->per_page += 5;
    }
}
