@section('page_title' , $page_title)
@push('css')
    <link href="{{ asset('authenticated/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@push('js')
    <script src="{{ asset('authenticated/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('authenticated/libs/ckeditor.js') }}"></script>
    <script wire:ignore>
        ClassicEditor.create(document.querySelector('#content')).then(editor => {
            editor.model.document.on('change:data', () => {
                @this.
                set('blog.content', editor.getData());
            })
        }).catch(error => {
            console.error(error);
        });
        $('#tags').select2({
            multiple: true,
        }).on("select2:select select2:unselect", function (e) {
            @this.
            set('tags', $(this).val());
        }).val({{ json_encode($selected_tags, JSON_THROW_ON_ERROR) }}).change();
    </script>
@endpush
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $page_title }}</h5>
                <form wire:submit="save" class="mt-4">
                    <x-blade-form-error-display/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="blog.title" id="title"
                                       placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="blog_category_id" class="form-label">Category ID <span
                                        class="text-danger">*</span></label>
                                <select type="text" class="form-select" wire:model="blog.category_id"
                                        id="blog_category_id"
                                        placeholder="Enter Title">
                                    <option value="">None</option>
                                    @foreach($blog_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}
                                            {{ isset($category->parent_id) ? ' - '.$category->parent->title : '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="priority" class="form-label">Priority <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="blog.priority" id="priority"
                                       placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3" wire:ignore>
                                <label for="tags" class="form-label">Tags</label>
                                <select class="form-control" id="tags"
                                        multiple="multiple" data-placeholder="Choose Tags">
                                    @foreach($blog_tags as $blog_category => $tag)
                                        <optgroup label="{{ $blog_category }}">
                                            @foreach($tag as $tag_array_element)
                                                <option
                                                    value="{{ $tag_array_element['id'] }}">{{ $tag_array_element['title'] }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="banner" class="form-label col-lg-12">Banner
                                    @if(isset($blog['banner']) && $blog['banner'])
                                        <a href="{{ $blog['banner'] }}" target="_blank" class="text-info float-end">Uploaded
                                            <i class="bx bx-link-external"></i></a>
                                    @endif
                                </label>
                                <input type="file" class="form-control" wire:model="blog.banner" id="banner">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea id="short_description" class="form-control"
                                          wire:model="blog.short_description"
                                          name="short_description">{{ @$blog['short_description'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12" wire:ignore>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea id="content" class="form-control"
                                          name="content">{{ @$blog['content'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="files" class="form-label col-lg-12">Additional Attachment Files
                                    @if(isset($blog['files']) && count($blog['files']))
                                        @foreach($blog['files'] as $file)
                                            <a href="{{ $file }}" target="_blank" class="text-info float-end m-2 m-2">Uploaded
                                                <i class="bx bx-link-external"></i></a>
                                        @endforeach
                                    @endif
                                </label>
                                <input type="file" class="form-control" wire:model="blog.files" id="banner" multiple>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
