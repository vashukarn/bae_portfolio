<div class="trending position-relative pb-65">
    <div class="container">
        <div class="row">
            @foreach($all_blogs as $blog)
            <article class="col-lg-4 col-md-6 mb-40 wow fadeIn animated">
                <div class="post-card-1 border-radius-10 hover-up">
                    <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ $blog->banner }})">
                        <a class="img-link" href="{{ route('blog.detail', $blog->slug) }}"></a>
                        <div class="post-meta-1 mb-20">
                            <a href="{{ route('category.index', ['slug' => $blog->category->slug, 'sub_slug' => $blog->category->slug]) }}" class="tag-category bg-brand-1 shadown-1 text-dark button-shadow hover-up-3">{{ $blog->category->title }}</a>
                        </div>
                    </div>
                    <div class="post-content p-30">
                        <div class="post-card-content">
                            <div class="entry-meta meta-1 float-left font-md mb-10">
                                <span class="post-on has-dot">{{ readableDate($blog->created_at, 'ymd') }}</span>
                            </div>
                            <h5 class="post-title font-md">
                                <a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @if($all_blogs->total() > $all_blogs->count())
        <div class="text-center mt-65">
            <button wire:click="loadMore" class="btn btn-lg bg-dark text-white d-inline-block">Load more posts</button>
        </div>
            @endif
    </div>
</div>
