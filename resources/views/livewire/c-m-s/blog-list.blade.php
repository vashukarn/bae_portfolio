@section('page_title' , $page_title)
<div class="page-content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{ $page_title }}</h4>
                </div>
            </div>
            <div class="col-lg-6">
                <a href="{{ route('blogs.create') }}" type="button"
                   class="float-end btn btn-primary waves-effect btn-label waves-light"><i
                        class="bx bx-plus-medical label-icon"></i>
                    New {{ \Illuminate\Support\Str::singular($page_title) }}</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light text-center">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Views</th>
                            <th>Author</th>
                            <th>Tags</th>
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
                                    <a href="{{ route('blog.detail', $item->slug) }}"
                                       target="_blank">
                                        {{ $item->title }}&nbsp;<i class="bx bx-link-external"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('category.index', $item->category->slug) }}"
                                       target="_blank">
                                        {{ @$item->category->title }}&nbsp;<i class="bx bx-link-external"></i>
                                    </a>
                                </td>
                                <td>{{ @$item->views }}</td>
                                <td>{{ @$item->author->name }}</td>
                                <td>
                                    @forelse($item->tags as $tag)
                                        <span class="badge badge-soft-info">{{ $tag->title }}</span>
                                    @empty
                                        None
                                    @endforelse
                                </td>
                                @can('blog_category.change_status')
                                    <td class="text-center">
                                        <div class="form-check form-switch form-switch-md mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                   wire:click="changeStatus({{ $item->id }})"
                                                   id="status_{{ $item->id }}" {{ $item->status ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                @endcan
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('blogs.edit', $item->id) }}" type="button"
                                           wire:click="editItem({{ $item->id }})"
                                           class="btn btn-secondary waves-effect waves-light"
                                           title="Edit {{ $item->title }}">
                                            <i class="bx bx-edit font-size-16 align-middle"></i>
                                        </a>
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
