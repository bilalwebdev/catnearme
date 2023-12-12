<!DOCTYPE html>
<html lang="en">
<head>
<style>
.main-menu ul li {

    padding-right: 15px !important;

}
@media (min-width: 1201px) and (max-width: 1250px) {
.theme-btn.gradient-btn.shadow-none.add-listing-btn-hide{
font-size:10px;
font-weight:400px 
}
}
</style>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {!! SEOMeta::generate() !!}

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/fav.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/sass/style.scss')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>


    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.4.1/dist/esri-leaflet.js"
            integrity="sha512-xY2smLIHKirD03vHKDJ2u4pqeHA7OQZZ27EjtqmuhDguxiUvdsOuXMwkg16PQrm9cgTmXtoxA6kwr8KBy3cdcw=="
            crossorigin=""></script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
          integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
          crossorigin="">
    <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
            integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
            crossorigin=""></script>

    @livewireStyles

    @stack('styles')

</head>
<body>
<!-- start per-loader -->
<div class="loader-container">
    <div class="loader-ripple">
        <div></div>
        <div></div>
    </div>
</div>
<!-- end per-loader -->

<section class="dashboard-wrap d-flex">

    @can('breeder')
        @include('__shared.home.header.dashboard.breeder')
    @elsecan('client')
        @include('__shared.home.header.dashboard.client')
    @endcan

    <div class="dashboard-body d-flex flex-column">
        <div class="dashboard-inner-body flex-grow-1">
            <nav class="navbar navbar-expand bg-navbar dashboard-topbar mb-4">
                <button id="sidebarToggleTop" class="btn rounded-circle mr-3">
                    <i class="la la-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    @can('breeder')
                    <livewire:dashboard.headers.alerts />
                    @endcan
                    <livewire:dashboard.headers.messages />
                    <li class="nav-item dropdown border-left pl-3 ml-4">
                        <a class="nav-link dropdown-toggle after-none" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-thumb user-thumb-sm position-relative">
                                <img src="{{ auth()->user()->getFirstMediaUrl('avatar' , 'thumb') }}">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <span
                                class="ml-2 small font-weight-medium d-none d-lg-inline">{{ auth()->user()->username }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right animated--grow-in py-2"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item text-color font-size-15" href="{{ route('dashboard.profile') }}">
                                <i class="la la-user mr-2 text-gray font-size-18"></i>
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item text-color font-size-15" href="{{ route('dashboard.chat') }}">
                                <i class="la la-envelope mr-2 text-gray font-size-18"></i>
                                {{ __('Messages') }}
                            </a>

                            @can('breeder')
                                <a class="dropdown-item text-color font-size-15" href="{{ route('pets.add') }}">
                                    <i class="la la-plus-circle mr-2 text-gray font-size-18"></i>
                                    {{ __('Add Listing') }}
                                </a>
                            @elsecan('client')
                                <a class="dropdown-item text-color font-size-15" href="{{ route('listings') }}">
                                    <i class="la la-arrow-right mr-2 text-gray font-size-18"></i>
                                    {{ __('Go listing') }}
                                </a>
                            @endcan
                            <a class="dropdown-item text-color font-size-15" href="{{ route('logout') }}">
                                <i class="la la-power-off mr-2 text-gray font-size-18"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                </ul>
            </nav><!-- end dashboard-topbar -->
            @yield('content')
        </div><!-- end dashboard-inner-body -->
        @include('__shared.home.footer.dashboard')
    </div><!-- end dashboard-body -->
</section>

<!-- Template JS Files -->
<script src="/assets/home/js/jquery-3.4.1.min.js"></script>
<script src="/assets/home/js/jquery-ui.js"></script>
<script src="/assets/home/js/popper.min.js"></script>
<script src="/assets/home/js/bootstrap.min.js"></script>
<script src="/assets/home/js/owl.carousel.min.js"></script>
<script src="/assets/home/js/jquery.fancybox.min.js"></script>
<script src="/assets/home/js/animated-headline.js"></script>
<script src="/assets/home/js/chosen.min.js"></script>
<script src="/assets/home/js/moment.min.js"></script>
<script src="/assets/home/js/datedropper.min.js"></script>
<script src="/assets/home/js/waypoints.min.js"></script>
<script src="/assets/home/js/jquery.counterup.min.js"></script>
<script src="{{ asset('assets\home\js\emojionearea.min.js') }}"></script>
<script src="/assets/home/js/main.js"></script>

@livewireScripts

@stack('scripts')

<script>

    window.addEventListener('toast-error', (e) => {
        Toastify({
            text: e.detail.message,
            className: "error",
            style: {
                background: "linear-gradient(270deg,#e85f90,#d56868)"
            },
            offset: {
                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 10 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },
            duration: 5000
        }).showToast();
    })

    window.addEventListener('toast-success', (e) => {
        Toastify({
            text: e.detail.message,
            className: "success",
            style: {
                background: "linear-gradient(270deg,#44eec3,#16d918)"
            },
            offset: {
                x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                y: 10 // vertical axis - can be a number or a string indicating unity. eg: '2em'
            },
            duration: 5000
        }).showToast();
    })

</script>


</body>
</html>
