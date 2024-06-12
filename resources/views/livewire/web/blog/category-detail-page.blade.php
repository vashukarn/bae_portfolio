<section id="mt_portfolio" class="gallery-section gallery-page">
    <div class="container">
        <div class="row portfolio_row">
            <div class="isotopeContainer">
                @foreach($all_blogs as $blog)
                    <div
                        class="portfolio_grid no-padding isotopeSelector grid-item">
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
            </div>
        </div>
        @if($all_blogs->total() != $all_blogs->count())
            <button type="button" wire:click="loadMore" class="mt_btn_color">Load More</button>
        @endif
    </div>
</section>
