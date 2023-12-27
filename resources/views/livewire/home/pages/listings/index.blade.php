<div>

    <livewire:home.headers.white/>

    <!-- Main Banner Section Start -->
    <div class="home-map">
        <div class="map-container height-500 w-100">
            <div id="map" wire:ignore></div>
        </div>
    </div>
    <!-- Home Map End -->

    <!-- ================================
        START BREADCRUMB AREA
    ================================= -->
    <section class="breadcrumb-area bg-gradient-gray py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-26 mb-0">{{ $seo->heading }}</h2>
                        </div>
                        {{ Breadcrumbs::render('listings') }}
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->

    <section class="card-area section-padding">

        @can('is_free')
            <div class="container" style="max-width: 1600px">
        @else
           <div class="container">
        @endcan

            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-bar d-flex flex-wrap justify-content-between align-items-center margin-bottom-30px">
                        <p class="result-text font-weight-medium">{{ __('Showing') }} {{ $listings->firstItem() }} {{ __('to') }} {{ $listings->lastItem() }} {{ __('of') }} {{ $listings->total() }} {{ __('entries') }}</p>
                    </div><!-- end filter-bar -->
                </div><!-- end col-lg-12 -->

                @can('is_free')
                    @include('__shared.home.pages.listings.free')
                @else
                    @include('__shared.home.pages.listings.subscribed')
                @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end card-area -->
    <!-- ================================
        END CARD AREA
    ================================= -->

    @push('scripts')

        <script>

            window.addEventListener('reload' , (e) => {
                window.location.href = '/cats-and-kittens-for-sale?' + e.detail.q
            })

            var cities = L.layerGroup();

            const listings = {{ \Illuminate\Support\Js::from($listingItems) }};

            listings.forEach(function (item) {
                L.marker([item.user.lat, item.user.lng]).bindPopup(
                    `<img src="${item.photo}" style="max-width: 125px"><br><br><b>${item.title}</b><br>Color: ${item.color}<br>Age: ${item.age}<br> Price: <b>$${item.price}</b><br>Price breeding: <b>$${item.price_breeding}</b><br> <br> <a href="/listings/show/${item.id}">Go To Listing</a>`
                ).addTo(cities);
            })

            var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
            var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

            var streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

            var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                minZoom: 3
            });

            var map = L.map('map', {
                center: [38.9072, 77.0369],
                zoom: 3,
                layers: [osm, cities]
            });

            map.attributionControl.setPrefix(false)

            var baseLayers = {
                'OpenStreetMap': osm,
                'Streets': streets
            };

            var overlays = {
                'Cities': cities
            };

        </script>

    @endpush
</div>
