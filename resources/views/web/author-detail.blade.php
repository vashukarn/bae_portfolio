<x-guest-layout>
    @section('page_title', $page_title)
    <section class="pt-65 pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-md-30">
                    <h2 class="display-2 mb-15 font-heading">{{ $author->name }}</h2>
                    <p class="font-lg text-grey-400 mb-30">
                        {{ $author->bio }}
                    </p>
                    @if($author->social_links()->count())
                        <ul class="author-social social-network d-inline-block list-inline">
                            <h6 class="text-grey-400">Social Media</h6>
                            @foreach($author->social_links as $social_link)
                                <li class="list-inline-item social-fb"><a href="{{ $social_link->link }}"
                                                                          target="_blank"
                                                                          title="{{ $social_link->social->title }}"><i
                                            class="elegant-icon social_{{ $social_link->social->title }}"></i></a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-lg-6">
                    <img
                        src="{{ $author->profile_image ?? 'https://ui-avatars.com/api/?background=e6bf7e&size=512&name='.urlencode($author->name) }}"
                        alt="{{ $author->name }}"></a>
                </div>
            </div>
        </div>
    </section>
    <livewire:web.blog.author-detail-page :id="$author->id"/>
</x-guest-layout>
