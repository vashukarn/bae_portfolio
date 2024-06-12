<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $page_title }}</h5>
        <form wire:submit="save" class="mt-4 col-lg-12 row">
            <x-blade-form-error-display/>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" wire:model.blur="password"
                           id="password" placeholder="Enter Password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" wire:model.blur="password_confirmation"
                           id="password_confirmation" placeholder="Enter Password">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-md">Update</button>
            </div>
        </form>
    </div>
</div>
