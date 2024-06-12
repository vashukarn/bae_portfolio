<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $page_title }}</h5>
        <form wire:submit="save" class="mt-4 col-lg-12 row">
            <x-blade-form-error-display/>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="username" class="form-label">Username <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model.blur="user.username"
                           id="username"
                           placeholder="Enter Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model.blur="user.name" id="name"
                           placeholder="Enter Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model.blur="user.email"
                           id="email"
                           placeholder="Enter Email" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" wire:model.blur="user.phone"
                           id="phone" placeholder="Enter Phone">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-md">Update</button>
            </div>
        </form>
    </div>
</div>
