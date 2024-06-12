<div class="card">
    <div class="card-body text-center">
        <form wire:submit="save">
            <x-blade-form-error-display/>
            <h5 class="card-title">{{ $page_title }}</h5>
            <img
                src="{{ (isset($profile_image) ? $profile_image->temporaryUrl() : auth()->user()->profile_image) ?? asset('front/images/placeholder.png') }}"
                alt=""
                class="rounded-circle avatar-lg col-lg-12">
            <div class="col-md-12 mt-4">
                <div class="mb-3">
                    <input type="file" class="form-control" wire:model.blue="profile_image"
                           id="profile_image"
                           placeholder="Profile Image">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-md">Update</button>
            </div>
        </form>
    </div>
</div>
