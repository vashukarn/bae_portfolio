<section id="mt_newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="started_heading text-center">
                    <h1>Newsletter</h1>
                    <p>Register now with our newsletter and get latest updates available.</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="newsletter_form">
                    <form wire:submit="save">
                        @honeypot()
                        <input type="email" wire:model.blur="email" placeholder="Enter your email">
                        <h6 class="text-danger mt-20">@error('name') {{ $message }} @enderror</h6>
                        <button type="submit" class="mt_btn_color">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
