<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CMS\Blog;
use App\Models\CMS\BlogCategory;
use App\Models\CMS\BlogTag;
use App\Models\Subscription;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'blogs' => Blog::count(),
            'blog_categories' => BlogCategory::count(),
            'blog_tags' => BlogTag::count(),
            'subscriptions' => Subscription::count(),
            'authors' => User::role(['Author'])->count(),
            'contact_form' => Blog::count(),
        ];
        $blogs = [
            'recent' => Blog::latest()->take(10)->get(),
            'popular' => Blog::orderBy('views', 'DESC')->take(10)->get(),
        ];
        $data = [
            'page_title' => 'Dashboard',
            'counts' => $counts,
            'blogs' => $blogs,
        ];
        return view('user.dashboard.blog', $data);
    }

    public function profile()
    {
        $data = [
            'page_title' => 'My Profile'
        ];
        return view('user.dashboard.profile', $data);
    }
}
