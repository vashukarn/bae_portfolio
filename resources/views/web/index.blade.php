<x-guest-layout>
    @section('page_title', $page_title)
    <section id="mt_banner"
             style="background-image: url('{{ $carousel->image ?? asset('assets/images/home-banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="banner-wrapper">
                    <div class="banner-caption">
                        @isset($carousel->title)
                            <h1 class="wow fadeInUp" data-wow-delay="0.1"><a
                                    href="{{ $carousel->redirect_url }}">{{ $carousel->title }}</a></h1>
                        @endisset
                        @isset($carousel->sub_title)
                            <p>{{ $carousel->sub_title }}</p>
                        @endisset
                        <a href="#mt_portfolio" class="mt_btn_color banner_down"><i class="ion-ios-arrow-thin-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="mt_portfolio" class="gallery-section gallery-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt_filter">
                        <ul class="list-inline text-center filter">
                            <li>
                                <a class="active" href="#"
                                   data-filter="*">All</a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="#"
                                       data-filter="{{ '.'.\Illuminate\Support\Str::slug($category->title) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row portfolio_row">
                <div class="isotopeContainer">
                    @foreach($categories as $category)
                        @foreach($category->blogs()->where('status', 1)->take(5)->get() as $blog)
                            <div
                                class="portfolio_grid no-padding isotopeSelector {{ \Illuminate\Support\Str::slug($category->title) }} grid-item">
                                <figure class="portfolio_hover">
                                    <img src="{{ $blog->banner ?? asset('placeholder.jpg') }}" alt="image"
                                         class="img-responsive center-block"/>
                                    <figcaption>
                                        <a href="{{ route('blog.detail', $blog->title) }}" class="detail_portfolio">
                                            <h3>{{ $blog->title }}</h3></a>
                                        <a href="{{ route('blog.detail', $blog->title) }}" class="fancybox open_img"><h5><i
                                                    class="ion-eye"></i></h5></a>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    @if($testimonials->count())
        <section id="mt_testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Recommendations</h3>
                        <div class="owl-carousel">
                            @foreach($testimonials as $testimonial)
                                <div class="item">
                                    <div class="testimonial_main">
                                        <div class="col-xs-12">
                                            <p>{{ $testimonial->content }}</p>
                                            <em>{{ $testimonial->name }}</em>
                                            <span>{{ $testimonial->designation }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <livewire:web.subscription-form/>
</x-guest-layout>
