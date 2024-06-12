<x-guest-layout>
    @section('page_title', $page_title)
    <section class="pt-65 pb-35 bg-brand-4">
        <div class="container">
            <div class="archive-header">
                <div class="archive-header-title">
                    <h1 class="font-heading mb-30">Contact</h1>
                    <p class="mb-0">Have questions or feedback? We'd love to hear from you! Feel free to reach out to us anytime.
                        <br> Together, let's make learning a truly transformative experience.</p>
                </div>
                <div class="breadcrumb">
                    <a href="{{ route('index') }}" rel="nofollow">Home</a>
                    <span></span> Contact
                </div>
            </div>
        </div>
    </section>
    <section class="pt-100 pb-65">
        <div class="container">
            <h3 class="font-heading mb-50">Get in Touch</h3>
            <div class="row">
                <livewire:web.contact-form/>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
