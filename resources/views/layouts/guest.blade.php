<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', 'Home') | {{ getBusinessSetting('app_name') }}</title>
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta content="{{ getBusinessSetting('meta_description') }}" name="description"/>
    <meta content="{{ getBusinessSetting('meta_site_author') }}" name="author"/>
    <link rel="icon" href="{{ getBusinessSetting('favicon') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/jquery.fancybox.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cb-slider.css') }}">
    <meta property="og:title" content="@yield('og_title', getBusinessSetting('app_name'))"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:image" content="@yield('og_image', getBusinessSetting('logo'))"/>
    <meta property="og:site_name" content="{{ getBusinessSetting('app_name') }}"/>
    <meta property="og:description"
          content="@yield('og_description', getBusinessSetting('slogan'))"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/et-line.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/YTPlayer.css') }}">
    @livewireStyles
    @stack('css')
</head>
<body>
{{--<div class="loading">--}}
{{--    <div class="loading-text">--}}
{{--        <span class="loading-text-words">A</span>--}}
{{--        <span class="loading-text-words">N</span>--}}
{{--        <span class="loading-text-words">K</span>--}}
{{--        <span class="loading-text-words">I</span>--}}
{{--        <span class="loading-text-words">T</span>--}}
{{--        <span class="loading-text-words">A</span>--}}
{{--    </div>--}}
{{--</div>--}}
<div id="home"></div>
<x-guest-header/>
    {{ $slot }}
<x-guest-footer/>

<script src="{{ asset('assets/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/typed.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>
<script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('assets/js/waypoint.js') }}"></script>
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@stack('modals')
@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts/>
@stack('js')
<script>
    function solveError(currentImage) {
        currentImage.style = "background-image: url({{ asset('placeholder.png') }})";
    }
</script>
</body>
</html>
