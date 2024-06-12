@section('page_title' , $page_title)
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{ $page_title }}</h4>
                </div>
            </div>
        </div>
        @can('blog_category.create_update')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ isset($blog_category['id']) ? 'Edit' : 'Add' }} {{ \Illuminate\Support\Str::singular($page_title) }}</h5>
                    <form wire:submit="save" class="mt-4">
                        <x-blade-form-error-display/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="blog_category.title" id="title"
                                           placeholder="Enter Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="blog_category.short_description"
                                           id="short_description"
                                           placeholder="Enter Description" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="blog_category_id" class="form-label">Category ID <span
                                            class="text-danger">*</span></label>
                                    <select type="text" class="form-select" wire:model="blog_category.category_id"
                                            id="blog_category_id"
                                            placeholder="Enter Title">
                                        <option value="">None</option>
                                        @foreach($blog_categories as $blog_category_id  => $category_name)
                                            <option value="{{ $blog_category_id }}">{{ $category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="banner" class="form-label col-lg-12">Banner
                                        @if(isset($blog_category['banner']) && is_string($blog_category['banner']))
                                            <a href="{{ $blog_category['banner'] }}" target="_blank"
                                               class="text-info float-end">Uploaded
                                                <i class="bx bx-link-external"></i></a>
                                        @endif
                                    </label>
                                    <input type="file" class="form-control" wire:model="blog_category.banner"
                                           id="banner">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light text-center">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Banner</th>
                            @can('blog_category.change_status')
                                <th>Status</th>
                            @endcan
                            <th style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{ route('category.index', ['slug' => $item->category->slug, 'sub_slug' => $item->slug]) }}" target="_blank">
                                        {{ $item->title }}&nbsp;<i class="bx bx-link-external"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('category.index', $item->category->slug) }}" target="_blank">
                                        {{ $item->category->title }}&nbsp;<i class="bx bx-link-external"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <img src="{{ $item->banner ?? asset('placeholder.png') }}"
                                         style="height: 100px;width: auto"
                                         onerror="this.onerror=null;this.src='{{ asset('placeholder.png') }}';"
                                         alt="{{ $item->title }}">
                                </td>
                                @can('blog_category.change_status')
                                    <td class="text-center">
                                        <div class="form-check form-switch form-switch-md">
                                            <input class="form-check-input" type="checkbox"
                                                   wire:click="changeStatus({{ $item->id }})"
                                                   id="status_{{ $item->id }}" {{ $item->status ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                @endcan
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" wire:click="editItem({{ $item->id }})"
                                                class="btn btn-secondary waves-effect waves-light"
                                                title="Edit {{ $item->title }}">
                                            <i class="bx bx-edit font-size-16 align-middle"></i>
                                        </button>
                                        @can('blog_category.delete')
                                            <livewire:delete-modal wire:key="{{ $item->id }}"
                                                                   :model-item="$item"/>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
