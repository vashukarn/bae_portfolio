<x-app-layout>
    @section('page_title', $page_title)
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Blog</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($counts as $key => $count)
                    <div class="col-lg-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex flex-wrap">
                                    <div class="me-3">
                                        <p class="text-muted mb-2">{{ \Illuminate\Support\Str::title(\Illuminate\Support\Str::replace('_', ' ', $key)) }}</p>
                                        <h5 class="mb-0">{{ $count }}</h5>
                                    </div>

                                    <div class="avatar-sm ms-auto">
                                        <div
                                            class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-book-bookmark"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom">
                            <div class="d-flex flex-wrap align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mt-1 mb-0">Posts</h5>
                                </div>
                                <ul class="nav nav-tabs nav-tabs-custom card-header-tabs ms-auto" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#post-recent" role="tab">
                                            Recent
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#post-popular" role="tab">
                                            Popular
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-simplebar style="max-height: 500px;">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="post-recent" role="tabpanel">
                                        <ul class="list-group list-group-flush">
                                            @foreach($blogs['recent'] as $blog)
                                                <li class="list-group-item py-3">
                                                    <div class="d-flex">
                                                        <div class="me-3">
                                                            <x-image-component :alt_text="$blog->title"
                                                                               :image_url="$blog->banner"
                                                                               :class="'avatar-md h-auto d-block rounded'"/>
                                                        </div>
                                                        <div class="align-self-center overflow-hidden me-auto">
                                                            <div>
                                                                <h5 class="font-size-14 text-truncate"><a
                                                                        href="{{ route('blog.detail', $blog->slug) }}"
                                                                        target="_blank"
                                                                        class="text-dark">{{ $blog->title }}</a></h5>
                                                                <p>{{ \Illuminate\Support\Str::limit($blog->short_description, 200) }}</p>
                                                                <p class="text-muted mb-0">{{ readableDate($blog->created_at, 'ymd') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="post-popular" role="tabpanel">
                                        <ul class="list-group list-group-flush">
                                            @foreach($blogs['popular'] as $blog)
                                                <li class="list-group-item py-3">
                                                    <div class="d-flex">
                                                        <div class="me-3">
                                                            <x-image-component :alt_text="$blog->title"
                                                                               :image_url="$blog->banner"
                                                                               :class="'avatar-md h-auto d-block rounded'"/>
                                                        </div>
                                                        <div class="align-self-center overflow-hidden me-auto">
                                                            <div>
                                                                <h5 class="font-size-14 text-truncate"><a
                                                                        href="{{ route('blog.detail', $blog->slug) }}"
                                                                        target="_blank"
                                                                        class="text-dark">{{ $blog->title }}</a></h5>
                                                                <p class="text-muted mb-0">{{ readableDate($blog->created_at, 'ymd') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
