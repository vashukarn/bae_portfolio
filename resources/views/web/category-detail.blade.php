<x-guest-layout>
    @section('page_title', $page_title)
    @php
    $background_image = asset('background.png');
    @endphp
    <section id="mt_banner_border" style="background-image: url('{{ $background_image }}')">
        <div class="banner-wrapper">
            <div class="banner-caption">
                <h2 style="color: #fff;" class="wow fadeInUp" data-wow-delay="0.1">{{ $category->title }}</h2>
            </div>
        </div>
    </section>
    <livewire:web.blog.category-detail-page :slug="$category->slug" />
    <div class="clearfix"></div>
</x-guest-layout>
