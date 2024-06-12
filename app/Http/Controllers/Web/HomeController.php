<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CMS\Blog;
use App\Models\CMS\BlogCategory;
use App\Models\CMS\BlogTag;
use App\Models\CMS\Carousel;
use App\Models\CMS\Testimonials;
use App\Models\JsonSetting;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $carousel = Carousel::where('status', 1)->orderBy('id', 'desc')->first();
        $categories = BlogCategory::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
        $testimonials = Testimonials::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $data = [
            'page_title' => 'Home',
            'carousel' => $carousel,
            'categories' => $categories,
            'testimonials' => $testimonials,
        ];
        return view('web.index', $data);
    }

    public function getBlogs($where_in_array, $take_limit)
    {
        return Blog::with(['category', 'tags', 'author'])
            ->whereIn('id', $where_in_array)
            ->orderBy('views', 'DESC')
            ->take($take_limit)->get();
    }

    public function about()
    {
        $added_blog_ids = [];
        $carousel_blogs = Blog::with(['category', 'tags', 'author'])->orderBy('views', 'DESC')->take(5)->get();
        $added_blog_ids = array_merge($added_blog_ids, $carousel_blogs->pluck('id')->toArray());
        $trending_blogs = Blog::with(['category', 'tags', 'author'])->whereNotIn('id', $added_blog_ids)->orderBy('views', 'DESC')->take(6)->get();
        $added_blog_ids = array_merge($added_blog_ids, $trending_blogs->pluck('id')->toArray());
        $editor_picks = Blog::with(['category', 'tags', 'author'])->whereNotIn('id', $added_blog_ids)->orderBy('views', 'DESC')->take(3)->get();
        $added_blog_ids = array_merge($added_blog_ids, $editor_picks->pluck('id')->toArray());
        $recent_article = Blog::with(['category', 'tags', 'author'])->whereNotIn('id', $added_blog_ids)->orderBy('id', 'DESC')->take(4)->get();
        $data = [
            'page_title' => 'About',
            'carousel_blogs' => $carousel_blogs,
            'trending_blogs' => $trending_blogs,
            'editor_picks' => $editor_picks,
            'recent_article' => $recent_article,
        ];
        return view('web.about', $data);
    }

    public function detail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        ++$blog->views;
        $blog->save();
        $related_blogs = Blog::where('category_id', $blog->category_id)->take(2)->get();
        $top_categories = BlogCategory::withCount(['blogs'])->whereNull('parent_id')->get();
        $data = [
            'page_title' => $blog->title,
            'blog' => $blog,
            'related_blogs' => $related_blogs,
            'top_categories' => $top_categories,
        ];
        return view('web.blog-detail', $data);
    }

    public function category_page($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $data = [
            'page_title' => $category->title,
            'category' => $category,
        ];
        return view('web.category-detail', $data);
    }

    public function tag_page($slug)
    {
        $tag = BlogTag::with(['blogs'])->where('slug', $slug)->firstOrFail();
        $added_blog_ids = [];
        $popular_blogs = $tag->blogs()->orderBy('views', 'DESC')->with(['category'])->limit(4)->get();
        $added_blog_ids = array_merge($added_blog_ids, $popular_blogs->pluck('id')->toArray());
        $gallery_blogs = $tag->blogs()->whereNotIn('id', $added_blog_ids)->orderBy('views', 'DESC')->with(['category'])->limit(9)->get();
        $data = [
            'page_title' => $tag->title,
            'tag' => $tag,
            'gallery_blogs' => $gallery_blogs,
            'popular_blogs' => $popular_blogs,
        ];
        return view('web.tag-detail', $data);
    }

    public function author_page($author_id)
    {
        $author = User::findOrFail($author_id);
        $data = [
            'page_title' => $author->name,
            'author' => $author,
        ];
        return view('web.author-detail', $data);
    }

    public function contact()
    {
        $data = [
            'page_title' => 'Contact',
        ];
        return view('web.contact', $data);
    }
}
