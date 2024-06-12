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
        @can('role.create_update')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ isset($role['id']) ? 'Edit' : 'Add' }} {{ \Illuminate\Support\Str::singular($page_title) }}</h5>
                    <form wire:submit="save" class="mt-4">
                        <x-blade-form-error-display/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" wire:model="role.name" id="name"
                                           placeholder="Enter Name">
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
                            <th>Name</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><label for="status_{{ $item->id }}">{{ $item->name }}</label></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" wire:click="editItem({{ $item->id }})"
                                                class="btn btn-secondary waves-effect waves-light"
                                                title="Edit {{ $item->name }}">
                                            <i class="bx bx-edit font-size-16 align-middle"></i>
                                        </button>
                                        @can('role.edit_permission')
                                            <a href="{{ route('permissions.edit', $item->id) }}" type="button"
                                               class="btn btn-primary waves-effect waves-light"
                                               title="Edit {{ $item->name }}'s Permission">
                                                <i class="bx bx-shield-quarter font-size-16 align-middle"></i>
                                            </a>
                                        @endcan
                                        @can('role.delete')
                                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                                    title="Delete {{ $item->name }}">
                                                <i class="bx bx-trash font-size-16 align-middle"></i>
                                            </button>
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
