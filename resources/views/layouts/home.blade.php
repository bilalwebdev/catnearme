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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate() !!}
    <link rel="icon" href="{{ asset('images/fav.png') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    @vite('resources/sass/style.scss')
    @vite('resources/js/app.js')

    @livewireStyles

    @stack('styles')

</head>
<body>
{{--<!-- start per-loader -->
<div class="loader-container">
    <div class="loader-ripple">
        <div></div>
        <div></div>
    </div>
</div>
<!-- end per-loader -->--}}

@yield('content')

<livewire:home.sections.footer />

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-arrow-up" title="{{ __('Go top') }}"></i>
</div>
<!-- end back-to-top -->

<livewire:account.login />

<livewire:account.register />

<livewire:account.reset-password />

<livewire:account.new-password />

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
<script src="/assets/home/js/jquery-rating.js"></script>
<script src="/assets/home/js/markerclusterer.js"></script>
<script src="/assets/home/js/rating-script.js"></script>
<script src="/assets/home/js/tilt.jquery.min.js"></script>
<script src="/assets/home/js/jquery.lazy.min.js"></script>
<script src="/assets/home/js/main.js"></script>

<script>
    @if(request()->has('token'))
       $('#new-password').modal().show()
    @endif
</script>

@livewireScripts

@stack('scripts')


<script>
    var userChosenSelect = $(".user-chosen-select")

    userChosenSelect.chosen({
        no_results_text: "Oops, nothing found!",
        allow_single_deselect: true
    });

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
