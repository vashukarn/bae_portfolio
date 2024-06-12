<x-guest-layout>
    @section('page_title', $page_title)
    <section class="pt-65 pb-65">
        <div class="container">
            <div class="archive-header pb-65">
                <div class="archive-header-title">
                    <h1 class="font-heading mb-30">{{ $tag->title }}
                        <sub>{{ $tag->blogs()->count() }} articles</sub>
                    </h1>
                    <p class="mb-0">{{ $tag->blog_category->title }}</p>
                </div>
            </div>
            <div class="hr"></div>
        </div>
    </section>
    <livewire:web.blog.tag-detail-page :slug="$tag->slug" />
</x-guest-layout>
