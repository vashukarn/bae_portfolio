<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', 'Dashboard') | {{ config('app.name') }}</title>
    <meta content="{{ getBusinessSetting('meta_description') }}" name="description"/>
    <meta content="{{ getBusinessSetting('meta_site_author') }}" name="author"/>
    <link rel="icon" href="{{ getBusinessSetting('favicon') }}">
    <link rel="shortcut icon" href="{{ asset('front/images/esports/favicon.ico') }}">
    <link href="{{ asset('authenticated/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('authenticated/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('authenticated/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    @livewireStyles
    @stack('css')
</head>
<body data-sidebar="dark">
<div id="layout-wrapper">
    @auth
    <x-auth-topbar/>
    <x-auth-sidebar/>
    @endauth
    <div class="{{ auth()->check() ? 'main-content' : '' }}">
        {{ $slot }}
        @auth
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © {{ config('app.name') }}.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by {{ getBusinessSetting('meta_site_author') }}
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        @endauth
    </div>
</div>
<script src="{{ asset('authenticated/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('authenticated/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('authenticated/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('authenticated/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('authenticated/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('authenticated/js/app.js') }}"></script>
@stack('modals')
@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
@stack('js')
</body>
</html>
