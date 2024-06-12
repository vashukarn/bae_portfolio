<?php

namespace App\View\Components;

use App\Models\CMS\BlogTag;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestFooter extends Component
{
    public function render(): View
    {
        $top_tags = BlogTag::withCount(['blogs'])->orderBy('blogs_count', 'DESC')->limit(8)->get();
        $social_links = User::find(1)->social_links;
        $data = [
            'top_tags' => $top_tags,
            'social_links' => $social_links,
        ];
        return view('components.guest-footer', $data);
    }
}
