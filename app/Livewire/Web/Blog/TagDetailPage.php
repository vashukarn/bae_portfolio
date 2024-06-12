<?php

namespace App\Livewire\Web\Blog;

use App\Models\CMS\Blog;
use App\Models\CMS\BlogTag;
use Livewire\Component;

class TagDetailPage extends Component
{
    public $slug;
    public int $per_page = 5;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $tag = BlogTag::where('slug', $this->slug)->firstOrFail();
        $added_blog_ids = [];
        $popular_blogs = Blog::whereHas('tags', static function ($tags) use ($tag) {
            $tags->where('id', $tag->id);
        })->orderBy('views', 'DESC')->with(['blog_category', 'author', 'tags'])->limit(4)->get();
        $added_blog_ids = array_merge($added_blog_ids, $popular_blogs->pluck('id')->toArray());
        $gallery_blogs = Blog::whereHas('tags', static function ($tags) use ($tag) {
            $tags->where('id', $tag->id);
        })->whereNotIn('id', $added_blog_ids)->orderBy('views', 'DESC')->with(['blog_category', 'author', 'tags'])->limit(6)->get();
        $added_blog_ids = array_merge($added_blog_ids, $gallery_blogs->pluck('id')->toArray());
        $all_blogs = Blog::whereHas('tags', static function ($tags) use ($tag) {
            $tags->where('id', $tag->id);
        })->whereNotIn('id', $added_blog_ids)->orderBy('id', 'DESC')->with(['blog_category', 'author', 'tags'])->take($this->per_page)->get();
        $data = [
            'gallery_blogs' => $gallery_blogs,
            'popular_blogs' => $popular_blogs,
            'all_blogs' => $all_blogs,
        ];
        return view('livewire.web.blog.tag-detail-page', $data);
    }

    public function loadMore(): void
    {
        $this->per_page += 5;
    }
}
