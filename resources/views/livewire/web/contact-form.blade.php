<div class="col-md-8">
    <form class="form-contact comment_form" wire:submit="save" id="commentForm">
        @honeypot()
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input class="form-control" name="name" wire:model.blur="name" id="name" type="text"
                           placeholder="Name">
                    <h6 class="text-danger mt-20">@error('name') {{ $message }} @enderror</h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input class="form-control" name="email" wire:model.blur="email" id="email" type="email"
                           placeholder="Email">
                    <h6 class="text-danger mt-20">@error('email') {{ $message }} @enderror</h6>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input class="form-control" name="phone" wire:model.blur="phone" id="phone" type="number"
                           placeholder="Phone">
                    <h6 class="text-danger mt-20">@error('phone') {{ $message }} @enderror</h6>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="comment" wire:model.blur="message" id="comment" cols="30"
                              rows="9"
                              placeholder="Message"></textarea>
                    <h6 class="text-danger mt-20">@error('message') {{ $message }} @enderror</h6>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-lg bg-dark text-white" type="submit">Finish & Submit</button>
        </div>
    </form>
</div>
