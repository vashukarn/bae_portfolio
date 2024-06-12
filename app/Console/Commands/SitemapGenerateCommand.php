<?php

namespace App\Console\Commands;

use App\Models\CMS\Blog;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapGenerateCommand extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Command description';

    public function handle(): void
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/about'))
            ->add(Url::create('/contact'));
        Blog::all()->each(function (Blog $blog) use ($sitemap) {
            $sitemap->add(Url::create("/{$blog->slug}"));
        });
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
