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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ isset($recommendation['id']) ? 'Edit' : 'Add' }} {{ \Illuminate\Support\Str::singular($page_title) }}</h5>
                <form wire:submit="save" class="mt-4">
                    <x-blade-form-error-display/>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" wire:model="recommendation.name" id="name"
                                       placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" wire:model="recommendation.designation"
                                       id="designation"
                                       placeholder="Enter Designation" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="content" class="form-label">Content
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" wire:model="recommendation.content" id="content"
                                       placeholder="Enter Content" required>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light text-center">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><label for="status_{{ $item->id }}">{{ $item->name }}</label></td>
                                <td>{{ $item->designation }}</td>
                                <td>{{ $item->content }}</td>
                                <td class="text-center">
                                    <div class="form-check form-switch form-switch-md mb-3">
                                        <input class="form-check-input" type="checkbox"
                                               wire:click="changeStatus({{ $item->id }})"
                                               id="status_{{ $item->id }}" {{ $item->status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" wire:click="editItem({{ $item->id }})"
                                                class="btn btn-secondary waves-effect waves-light"
                                                title="Edit {{ $item->title }}">
                                            <i class="bx bx-edit font-size-16 align-middle"></i>
                                        </button>
                                        @can('recommendation.delete')
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
