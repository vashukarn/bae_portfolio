<div class="recent-posts pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="loop-list loop-list-style-1  mb-md-30">
                    @foreach($all_blogs as $blog)
                        <article class="hover-up-3 border-radius-10 overflow-hidden wow fadeIn animated">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="post-thumb position-relative"
                                         style="background-image: url({{ $blog->banner }})">
                                        <a class="img-link" href="{{ route('blog.detail', $blog->slug) }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-7 align-self-center">
                                    <div class="post-content pr-30">
                                        <div class="post-meta-1 mb-20">
                                            <a href="{{ route('category.index', $blog->blog_category->slug) }}"
                                               class="tag-category bg-brand-1 shadown-1 text-dark button-shadow hover-up-3"
                                               tabindex="0">{{ $blog->blog_category->title }}</a>
                                        </div>
                                        <h4 class="post-title mb-40">
                                            <a class=""
                                               href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                                        </h4>
                                        <div class="d-flex">
                                            <div class="post-meta-2 font-md d-flex w-70">
                                                <a class="align-self-center"
                                                   href="{{ route('author.index', $blog->author->id) }}" tabindex="0">
                                                    <img
                                                        src="{{ $blog->author->profile_image ?? 'https://ui-avatars.com/api/?background=e6bf7e&name='.urlencode($blog->author->name) }}"
                                                        alt="">
                                                </a>
                                                <div class="mb-0">
                                                    <a href="{{ route('author.index', $blog->author->id) }}"
                                                       tabindex="0"> <strong
                                                            class="author-namge">{{ $blog->author->name }}</strong></a>
                                                    <p class="post-on font-sm text-grey-400 mb-0">{{ $blog->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 primary-sidebar sticky-sidebar">
                <div class="widget-area">
                    @if($popular_blogs->count())
                        <div class="sidebar-widget widget-latest-posts mb-50 wow fadeIn animated">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30 font-heading">Most popular</h5>
                            </div>
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                    @foreach($popular_blogs as $blog)
                                        <li class="wow fadeIn animated">
                                            <div class="d-flex latest-small-thumb">
                                                <div
                                                    class="post-thumb d-flex mr-15 border-radius-10 img-hover-scale overflow-hidden">
                                                    <a class="color-white"
                                                       href="{{ route('blog.detail', $blog->slug) }}" tabindex="0">
                                                        <x-image-component :alt_text="$blog->title"
                                                                           :image_url="$blog->banner"/>
                                                    </a>
                                                </div>
                                                <div class="post-content media-body align-self-center">
                                                    <h5 class="post-title mb-15 text-limit-3-row font-medium">
                                                        <a href="{{ route('blog.detail', $blog->slug) }}"
                                                           tabindex="0">{{ $blog->title }}</a>
                                                    </h5>
                                                    <div class="entry-meta meta-1 float-left font-sm">
                                                        <span
                                                            class="post-on has-dot">{{ readableDate($blog->created_at, 'ymd') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if($gallery_blogs->count())
                        <div class="sidebar-widget widget_instagram wow fadeIn animated">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30 font-heading">Gallery</h5>
                            </div>
                            <div class="instagram-gellay">
                                <ul class="insta-feed">
                                    @foreach($gallery_blogs as $blog)
                                        <li>
                                            <a href="{{ route('blog.detail', $blog->slug) }}" class="play-video"
                                               data-animate="zoomIn"
                                               data-duration="1.5s" data-delay="0.1s"><img class="border-radius-10"
                                                                                           src="{{ $blog->banner ?? asset('placeholder.png') }}"
                                                                                           alt="{{ $blog->title }}"></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if($all_blogs->total() > $all_blogs->count())
        <div class="mt-65">
            <button wire:click="loadMore" class="btn btn-lg bg-dark text-white d-inline-block">Load more posts</button>
        </div>
            @endif
    </div>
</div>
