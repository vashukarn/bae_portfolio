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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Roles</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><label for="status_{{ $item->id }}">{{ $item->name }}</label></td>
                                <td>{{ $item->email }}
                                    @if(isset($item->email_verified_at))
                                        <i class="bx bx-check-circle text-success font-size-16"></i>
                                    @endif
                                </td>
                                <td>{{ $item->phone }}
                                    @if(isset($item->phone_verified_at))
                                        <i class="bx bx-check-circle text-success font-size-16"></i>
                                    @endif
                                </td>
                                <td>
                                    @foreach($item->roles as $role)
                                        <span
                                            class="badge badge-pill badge-soft-primary font-size-11">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <span
                                        class="badge badge-pill @if($item->status === 'ACTIVE') badge-soft-success @elseif($item->status === 'INACTIVE') badge-soft-warning @else badge-soft-danger @endif font-size-11">{{ $item->status }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" user="group">
{{--                                        <button type="button" wire:click="editItem({{ $item->id }})"--}}
{{--                                                class="btn btn-secondary waves-effect waves-light"--}}
{{--                                                title="Edit {{ $item->name }}">--}}
{{--                                            <i class="bx bx-edit font-size-16 align-middle"></i>--}}
{{--                                        </button>--}}
                                        @can('user.delete')
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
