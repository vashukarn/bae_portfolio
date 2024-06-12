<x-guest-layout>
    @section('page_title', $page_title)
    @section('og_title', $blog->title)
    @section('og_image', $blog->banner ?? asset('placeholder.png'))
    @section('og_description', $blog->short_description)
    <section id="blog_main_sec">
        <div class="container">
            <div class="row">
                <main class="col-md-8">
                    @isset($blog->banner)
                        <div class="post_img">
                            <img src="{{ $blog->banner }}" alt="{{ $blog->title }}">
                        </div>
                    @endisset
                    <div class="post_title">
                        <h3>{{ $blog->title }}</h3>
                        <ul class="list-inline list-unstyled">
                            <li>
                                <i class="ion-ios-person-outline"></i>&nbsp;
                                {{ $blog->author->name }}
                            </li>
                            <li>
                                <i class="ion-ios-calendar-outline"></i>&nbsp;
                                {{ readableDate($blog->created_at, 'ymd') }}
                            </li>
                        </ul>
                    </div>
                    <div class="post_body">
                        <p>{{ $blog->short_description }}</p>
                        {!! $blog->content !!}
                    </div>
                    <div class="author_box mt-4">
                        <div class="author_img">
                            <img src="{{ $blog->author->profile_image }}" alt="{{ $blog->author->name }}">
                        </div>
                        <div class="author_bio">
                            <h5>{{ $blog->author->name }}</h5>
                            <p>{{ $blog->author->bio }}</p>
                            <ul>
                                @foreach($blog->author->social_links as $social_link)
                                    <li><a href="{{ $social_link->link }}"><i
                                                class="{{ $social_link->social->font_awesome_icon }}"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </main>
                <aside class="col-sm-4">
                    @isset($blog->instagram_reel_link)
                        <div class="iframe-container">
                            <iframe src="{{ $blog->instagram_reel_link }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <style>
                            .iframe-container {
                                position: relative;
                                width: 100%;
                                padding-bottom: 177.78%;
                                height: 0;
                                overflow: hidden;
                            }
                            .iframe-container iframe {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                border: 0;
                            }
                        </style>
                    @endisset
                    @if($related_blogs->count())
                        <section class="widget widget_recent_entries">
                            <h3 class="blog_heading_border">
                                Recent Posts
                            </h3>
                            <ul>
                                @foreach($related_blogs as $related_blog)
                                    <li>
                                        <img src="{{ $related_blog->banner }}" alt="{{ $related_blog->title }}"/>
                                        <h4>
                                            <a href="{{ route('blog.detail', $related_blog->slug) }}">{{ $related_blog->title }}</a>
                                        </h4>
                                        <p>{{ readableDate($related_blog->created_at, 'ymd') }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    @endif
                    <section class="widget">
                        <h3 class="blog_heading_border">
                            Categories
                        </h3>
                        <ul>
                            @foreach($top_categories as $category)
                                <li>
                                    <a href="{{ route('category.index', $category->slug) }}">
                                        {{ $category->title }}
                                    </a>
                                    <span class="categoryCount">({{ $category->blogs_count }})</span>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                </aside>
            </div>
        </div>
    </section>
</x-guest-layout>
