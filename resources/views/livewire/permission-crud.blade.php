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
        @foreach($permissions as $key => $permission)
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h5 class="mb-md-0 h6">{{ $key }}</h5>
                    </div>
                </div>
                <div class="card-body col-lg-12 row">
                    @foreach($permission as $single_permission)
                        <div class="col-lg-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                       wire:click="addPermission({{ $single_permission['id'] }})"
                                       {{ $single_permission['has_permission'] ? 'checked' : '' }}
                                       id="permission_{{ $single_permission['id'] }}">
                                <label class="form-check-label"
                                       for="permission_{{ $single_permission['id'] }}">{{ $key }} {{ $single_permission['name'] }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
