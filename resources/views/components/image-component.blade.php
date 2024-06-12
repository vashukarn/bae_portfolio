<img
    src="{{ (isset($image_url) && $image_url) ?? $placeholder_img }}" class="{{ $class }}"
    onerror="this.onerror=null;this.src='{{ $placeholder_img }}';" alt="">
