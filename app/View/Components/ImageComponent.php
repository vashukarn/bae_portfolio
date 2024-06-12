<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageComponent extends Component
{
    public mixed $alt_text;
    public mixed $image_url;
    public mixed $class;
    public bool $wide;

    public function __construct(
        $image_url = null,
        $alt_text = null,
        $class = '',
        $wide = false
    )
    {
        $this->image_url = $image_url;
        $this->alt_text = $alt_text;
        $this->class = $class;
        $this->wide = $wide;
    }

    public function render(): View
    {
        $placeholder_img = $this->wide ? asset('placeholder-wide.png') : asset('placeholder.png');
        return view('components.image-component', compact('placeholder_img'));
    }
}
