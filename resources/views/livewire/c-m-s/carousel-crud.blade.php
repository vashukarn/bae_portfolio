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
                <h5 class="card-title">{{ isset($carousel['id']) ? 'Edit' : 'Add' }} {{ \Illuminate\Support\Str::singular($page_title) }}</h5>
                <form wire:submit="save" class="mt-4">
                    <x-blade-form-error-display/>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" wire:model="carousel.title" id="title"
                                       placeholder="Enter Title" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="sub_title" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" wire:model="carousel.sub_title"
                                       id="sub_title"
                                       placeholder="Enter Subtitle (If Any)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="redirect_url" class="form-label">Redirect URL</label>
                                <input type="url" class="form-control" wire:model="carousel.redirect_url"
                                       id="redirect_url"
                                       placeholder="Enter Subtitle (If Any)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="image" class="form-label col-lg-12">Banner
                                    @if(isset($carousel['image']) && is_string($carousel['image']))
                                        <a href="{{ $carousel['image'] }}" target="_blank"
                                           class="text-info float-end">Uploaded
                                            <i class="bx bx-link-external"></i></a>
                                    @endif
                                </label>
                                <input type="file" class="form-control" wire:model="carousel.image"
                                       id="image">
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
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Banner</th>
                            <th>Status</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{ $item->redirect_url }}" target="_blank">
                                        {{ $item->title }}&nbsp;<i class="bx bx-link-external"></i>
                                    </a>
                                </td>
                                <td>{{ $item->sub_title }}</td>
                                <td><img src="{{ $item->image }}" style="height: 200px;" alt=""></td>
                                <td class="text-center">
                                    <div class="form-check form-switch form-switch-md">
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
                                            <livewire:delete-modal wire:key="{{ $item->id }}"
                                                                   :model-item="$item"/>
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
