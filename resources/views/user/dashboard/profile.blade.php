<x-app-layout>
    @section('page_title' , $page_title)
    @push('css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <style>.font2 {
                font-family: "Press Start 2P", system-ui;
                font-weight: 400;
                font-style: normal;
                background: -webkit-linear-gradient(#4ECEE9, #6451AA);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        </style>
    @endpush
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 row">
                    <div class="col-lg-6 page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $page_title }}</h4>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-3 float-end font2">{{ auth()->user()->roles()->first()->name }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 row">
                <div class="col-lg-8">
                    <livewire:profile.edit-basic/>
                </div>
                <div class="col-lg-4">
                    <livewire:profile.edit-profile-image/>
                </div>
                <div class="col-lg-8">
                    <livewire:profile.edit-password/>
                </div>
                <div class="col-lg-8">
                    <livewire:profile.edit-social-links/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
