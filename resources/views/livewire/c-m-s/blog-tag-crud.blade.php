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
        @can('blog_tag.create_update')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ isset($blog_tag['id']) ? 'Edit' : 'Add' }} {{ \Illuminate\Support\Str::singular($page_title) }}</h5>
                    <form wire:submit="save" class="mt-4">
                        <x-blade-form-error-display/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" wire:model="blog_tag.title" id="title"
                                           placeholder="Enter Title" required>
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
                            @can('blog_tag.change_status')
                                <th>Status</th>
                            @endcan
                            <th style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><label for="status_{{ $item->id }}">{{ $item->title }}</label></td>
                                @can('blog_tag.change_status')
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
                                        <button type="button" wire:click="editItem({{ $item->id }})"
                                                class="btn btn-secondary waves-effect waves-light"
                                                title="Edit {{ $item->title }}">
                                            <i class="bx bx-edit font-size-16 align-middle"></i>
                                        </button>
                                        @can('blog_tag.delete')
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
