<?php

namespace App\Observers;

use App\Models\CMS\Blog;

class BlogObserver
{
    public function created(Blog $blog): void
    {
        $blog->author_id = auth()->check() ? auth()->user()->id : 1;
        $blog->save();
    }
}
