@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Errors : <br>
        @foreach ($errors->all() as $error)
            <i class="mdi mdi-block-helper me-2"></i>
            {{ \Illuminate\Support\Str::replace('.', ' ', \Illuminate\Support\Str::replace('_', ' ', $error)) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><br>
        @endforeach
    </div>
@endif
