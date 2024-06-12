<?php

namespace App\View\Components;

use App\Models\CMS\BlogCategory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestHeader extends Component
{
    public function render(): View
    {
        $top_categories = BlogCategory::whereNull('parent_id')->limit(4)->get();
        $data = [
            'top_categories' => $top_categories,
        ];
        return view('components.guest-header', $data);
    }
}
