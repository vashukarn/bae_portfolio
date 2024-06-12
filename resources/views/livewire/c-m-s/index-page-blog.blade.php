@section('page_title' , $page_title)
@push('css')
    <link href="{{ asset('authenticated/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@push('js')
    <script src="{{ asset('authenticated/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('authenticated/js/pages/form-advanced.init.js') }}"></script>
    <script wire:ignore>
        $('#carousel_blogs').select2().on("select2:select select2:unselect", function (e) {
            let lastSelectedItem = e.params.data.id;
            @this.
            setBlog(lastSelectedItem, "carousel_blogs");
        });
        $('#trending_topics').select2().on("select2:select select2:unselect", function (e) {
            let lastSelectedItem = e.params.data.id;
            @this.
            setBlog(lastSelectedItem, "trending_topics");
        });
        $('#editors_picked').select2().on("select2:select select2:unselect", function (e) {
            let lastSelectedItem = e.params.data.id;
            @this.
            setBlog(lastSelectedItem, "editors_picked");
        });
        $('#recent_articles').select2().on("select2:select select2:unselect", function (e) {
            let lastSelectedItem = e.params.data.id;
            @this.
            setBlog(lastSelectedItem, "recent_articles");
        });
    </script>
@endpush
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $page_title }}</h5>
                <form wire:submit="save" class="mt-4 col-lg-12 row">
                    <x-blade-form-error-display/>
                    <div class="col-md-6" wire:ignore>
                        <div class="mb-3">
                            <label for="carousel_blogs" class="form-label">Top Carousel Blogs
                                <span class="text-danger">*</span>
                            </label>
                            <select class="select2 form-control select2-multiple" id="carousel_blogs"
                                    multiple="multiple" required>
                                @foreach($blogs as $blog)
                                    <option
                                        {{ (isset($previous_values['carousel_blogs']) && in_array($blog->id, $previous_values['carousel_blogs'])) ? 'selected' : '' }}
                                        value="{{ $blog->id }}">{{ $blog->id }} : {{ $blog->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6" wire:ignore>
                        <div class="mb-3">
                            <label for="trending_topics" class="form-label">Trending Topics
                                <span class="text-danger">*</span>
                            </label>
                            <select class="select2 form-control select2-multiple" id="trending_topics"
                                    multiple="multiple" required>
                                @foreach($blogs as $blog)
                                    <option
                                        {{ (isset($previous_values['trending_topics']) && in_array($blog->id, $previous_values['trending_topics'])) ? 'selected' : '' }}
                                        value="{{ $blog->id }}">{{ $blog->id }} : {{ $blog->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6" wire:ignore>
                        <div class="mb-3">
                            <label for="editors_picked" class="form-label">Editor's Picked
                                <span class="text-danger">*</span>
                            </label>
                            <select class="select2 form-control select2-multiple" id="editors_picked"
                                    multiple="multiple" required>
                                @foreach($blogs as $blog)
                                    <option
                                        {{ (isset($previous_values['editors_picked']) && in_array($blog->id, $previous_values['editors_picked'])) ? 'selected' : '' }}
                                        value="{{ $blog->id }}">{{ $blog->id }} : {{ $blog->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6" wire:ignore>
                        <div class="mb-3">
                            <label for="recent_articles" class="form-label">Recent Articles
                                <span class="text-danger">*</span>
                            </label>
                            <select class="select2 form-control select2-multiple" id="recent_articles"
                                    multiple="multiple" required>
                                @foreach($blogs as $blog)
                                    <option
                                        {{ (isset($previous_values['recent_articles']) && in_array($blog->id, $previous_values['recent_articles'])) ? 'selected' : '' }}
                                        value="{{ $blog->id }}">{{ $blog->id }} : {{ $blog->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
