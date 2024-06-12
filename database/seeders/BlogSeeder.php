<?php

namespace Database\Seeders;

use App\Models\CMS\Blog;
use App\Models\CMS\BlogCategory;
use App\Models\CMS\BlogTag;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        BlogCategory::create([
            'title' => 'Blogs',
            'short_description' => '',
            'banner' => asset('placeholder-wide.jpg'),
        ]);
        BlogCategory::create([
            'title' => 'Projects',
            'short_description' => '',
            'banner' => asset('placeholder-wide.jpg'),
        ]);
        BlogCategory::create([
            'title' => 'Instagram',
            'short_description' => '',
            'banner' => asset('placeholder-wide.jpg'),
        ]);
        if (config('app.debug')) {
            Blog::factory()->count(200)->create()->each(function ($blog) {
                $tags = BlogTag::take(4)->inRandomOrder()->get();
                foreach ($tags as $tag) {
                    $blog->tags()->save($tag);
                }
            });
        }
    }
}
