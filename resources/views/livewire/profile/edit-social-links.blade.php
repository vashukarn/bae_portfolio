<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $page_title }}</h5>
        <form wire:submit="save" class="mt-4 col-lg-12 row">
            <x-blade-form-error-display/>
            @foreach($socials as $social)
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="social_link_{{ $social->id }}" class="form-label">{{ $social->title }}  (<i class="{{ $social->font_awesome_icon }}"></i>)</label>
                        <input type="text" class="form-control" wire:model="social_links.{{ $social->id }}"
                               id="social_link_{{ $social->id }}"
                               placeholder="Enter {{ $social->title }} Link">
                    </div>
                </div>
            @endforeach
            <div>
                <button type="submit" class="btn btn-primary w-md">Update</button>
            </div>
        </form>
    </div>
</div>
