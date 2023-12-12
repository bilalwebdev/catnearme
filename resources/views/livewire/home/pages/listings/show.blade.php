<div>

    <livewire:home.headers.white />

    <!-- ================================
        START FULL SCREEN SLIDER
    ================================= -->
    <section class="full-screen-slider-area" >
        <div class="full-screen-slider owl-trigger-action owl-trigger-action-2" wire:ignore>
            @foreach($pet->getMedia('photos') as $gallery)
                <a href="{{ $gallery->getUrl('gallery') }}" class="fs-slider-item d-block" data-fancybox="gallery" data-caption="Showing image - 01">
                    <img src="{{ $gallery->getUrl('gallery') }}" alt="single listing image">
                </a><!-- end fs-slider-item -->
            @endforeach
        </div>
    </section><!-- end full-screen-slider-area -->
    <!-- ================================
        END FULL SCREEN SLIDER
    ================================= -->

    <section class="breadcrumb-area bg-gradient-gray py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content breadcrumb-content-2 d-flex flex-wrap align-items-end justify-content-between">
                        <div class="section-heading">

                            <div class="user-bio margin-bottom-30px">
                                <a href="{{ route('user.breeder.profile', $pet->user) }}" class="d-flex align-items-center">
                                    <div class="user-thumb user-thumb-md mr-3">
                                        <img src="{{ $pet->user->getFirstMediaUrl('avatar' , 'thumb') }}" alt="{{ $pet->user->username }}">
                                    </div>
                                    <div class="user-inner-bio">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="author__title mr-1">{{ $pet->user->username }}</h4>
                                            @if($pet->user->is_verify)
                                                <div class="shield-user">
                                                    <img src="{{ Vite::asset('resources/images/home/shield-transparent.png') }}" width="100">
                                                </div>
                                            @endif
                                        </div>
                                        <p class="author__meta">{{ $pet->user->country->name }}</p>
                                    </div>
                                </a>
                            </div>


                            <div class="d-flex align-items-center pt-1">
                                <h2 class="sec__title mb-0">{{ $pet->title }}</h2>
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="star-rating-wrap d-flex align-items-center">
                                    <div class="star-rating text-color-5 font-size-18">
                                        @for($rating = 0; $rating < $pet->user->averageRating(); $rating++)
                                            <span><i class="la la-star"></i></span>
                                        @endfor
                                    </div>
                                    <p class="font-size-14 pl-2 font-weight-medium">{{ $pet->user->reviews->count() }} {{ __('reviews') }}</p>
                                </div>
                            </div>
                            <div class="badge badge-warning font-size-22 mt-3">{{ $pet->user->averageRating(1) ?? 0.0 }}</div>
                        </div>
                        <div class="btn-box d-flex align-items-center">
                            <span class="btn-gray mr-2"><i class="la la-eye mr-1"></i>{{ __('Views') }} - {{ $pet->views }}</span>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <section class="listing-detail-area padding-top-60px padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="listing-detail-wrap">
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">{{ __('Description') }}</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <p class="pb-3 font-weight-medium line-height-30">
                                    {{ str($pet->description)->limit(30 ,'...') }}
                                </p>
                                <div class="collapse collapse-content" id="showMoreOptionCollapse">
                                    <p class="font-weight-medium line-height-30 pb-3">
                                        {!! $pet->description !!}
                                    </p>
                                </div>
                                <a class="collapse-btn" data-toggle="collapse" href="#showMoreOptionCollapse" role="button" aria-expanded="false" aria-controls="showMoreOptionCollapse">
                                    <span class="collapse-btn-hide">{{ __('Read More') }} <i class="la la-plus ml-1"></i></span>
                                    <span class="collapse-btn-show">{{ __('Read Less') }} <i class="la la-minus ml-1"></i></span>
                                </a>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">{{ __('General Information') }}</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="info-list-box">
                                    <ul class="row info-list">
                                        <li class="col-lg-6"><span aria-hidden="true"><i class="la la-circle-o"></i></span>{{ __('Breed') }} - {{ $pet->breed->title }}</li>
                                        <li class="col-lg-6"><span aria-hidden="true"><i class="la la-circle-o"></i></span>{{ __('Age') }} - {{ $pet->age }}</li>
                                        <li class="col-lg-6"><span aria-hidden="true"><i class="la la-circle-o"></i></span>{{ __('Gender') }} - {{ $pet->gender }}</li>
                                        <li class="col-lg-6"><span aria-hidden="true"><i class="la la-circle-o"></i></span>{{ __('Color') }} - {{ $pet->color }}</li>
                                    </ul>
                                </div>
                            </div><!-- end block-card-body -->
                        </div>


                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">{{ __('Vactinations') }}</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <ul class="list-items row">
                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="Feline Herpesvirus (FHV)"
                                            wire:model="vactinations.fnv"
                                            popup="Protects against the feline herpesvirus, a common respiratory infection in cats."
                                        />
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="Feline Calicivirus (FCV)"
                                            wire:model="vactinations.fcv"
                                            popup="Guards against feline calicivirus, another viral respiratory infection in cats."
                                        />
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="Feline Panleukopenia (FPV)"
                                            wire:model="vactinations.fpv"
                                            popup="Also known as the feline distemper vaccine, it protects against a highly contagious and potentially deadly viral infection."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="Rabies"
                                            wire:model="vactinations.rabies"
                                            popup="Required by law in many regions, the rabies vaccine protects against the rabies virus, which can affect cats and humans."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="Feline Leukemia Virus (FeLV)"
                                            wire:model="vactinations.felv"
                                            popup="Recommended for cats at risk of exposure to the feline leukemia virus, which can cause various health issues, including immune suppression and cancer."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="Chlamydia"
                                            wire:model="vactinations.chlamydia"
                                            popup="Offers protection against chlamydia, a bacterial infection that can lead to conjunctivitis and respiratory problems in cats."
                                        />
                                    </div><!-- end col-lg-6 -->
                                </ul>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Certification and Documentation</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="form-box row">

                                    <div class="col-lg-4">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="The International Cat Association (TICA)"
                                            wire:model="certifications.tica"
                                            popup=" TICA is one of the largest and well-known cat registries worldwide. It recognizes and registers a wide range of cat breeds, holds cat shows, and promotes responsible cat breeding."
                                        />
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-4">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="Cat Fanciers' Association (CFA)"
                                            wire:model="certifications.cfa"
                                            popup="CFA is another major cat registry and breeder association. It is one of the oldest and most prestigious cat organizations in North America, recognizing and promoting purebred cats through cat shows, breed standards, and educational programs."
                                        />
                                    </div><!-- end col-lg-4 -->


                                    <div class="col-lg-4">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="American Cat Fanciers Association (ACFA)"
                                            wire:model="certifications.acfa"
                                            popup="ACFA is an organization based in the United States that focuses on cat shows, breed recognition, and promoting responsible cat breeding practices. It recognizes and registers various cat breeds."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-4">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="The Governing Council of the Cat Fancy (GCCF)"
                                            wire:model="certifications.gccf"
                                            popup="GCCF is the primary cat registry and breeder association in the United Kingdom. It oversees the registration, breed standards, and shows for pedigree cats."
                                        />
                                    </div><!-- end col-lg-6 -->


                                    <div class="col-lg-4">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="Cat Control Council of New South Wales (CCC of NSW)"
                                            wire:model="certifications.ccc_nsw"
                                            popup="CCC of NSW is an Australian cat registry and breeder association that promotes responsible breeding, cat welfare, and organizes cat shows in the state of New South Wales."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-4">
                                        <x-home.ui.question-checkbox
                                            :disabled="true"
                                            title="The World Cat Federation (WCF)"
                                            wire:model="certifications.wcf"
                                            popup="Founded in 1988, the WCF is headquartered in Germany and has member organizations and clubs in multiple countries around the world."
                                        />
                                    </div><!-- end col-lg-6 -->

                                </div>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">{{ __('Location') }} / {{ __('Contact') }}</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="map-container height-400">
                                    <div class="map-container height-400">
                                        <div id="map"></div>
                                    </div>
                                </div>
                                <ul class="list-items list--items list-items-style-2 py-4">
                                    <li><span class="text-color"><i class="la la-map mr-2 text-color-2 font-size-18"></i>{{ __('Address') }}:</span> {{ $pet->user->address ?? 'No address' }}</li>
                                    <li><span class="text-color"><i class="la la-phone mr-2 text-color-2 font-size-18"></i>{{ __('Phone') }}:</span><a href="tel:{{ $pet->user->phone_number }}">{{ $pet->user->phone_number ?? 'No phone number' }}</a></li>
                                    <li><span class="text-color"><i class="la la-envelope mr-2 text-color-2 font-size-18"></i>{{ __('Email') }}:</span><a href="mailto:{{ $pet->user->email }}">{{ $pet->user->email }}</a></li>
                                </ul>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->

                        @if(! $faqs->isEmpty())
                          <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">{{ __('Questions') }} &amp; {{ __('Answers') }}</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="accordion-item" id="accordion">
                                    @foreach($faqs as $faq)
                                        <div class="card">
                                            <div class="card-header" id="{{ $faq->id }}">
                                                <h5>
                                                    <button class="btn btn-link d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapse-{{ $faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $faq->id }}">
                                                        {{ $faq->name }}
                                                        <i class="la la-minus"></i>
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse-{{ $faq->id }}" class="collapse" aria-labelledby="heading-{{ $faq->id }}" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p>{{ $faq->text }}</p>
                                                </div>
                                            </div>
                                        </div><!-- end card -->
                                    @endforeach
                                </div>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        @endif
                    </div><!-- end listing-detail-wrap -->


                    <div class="block-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title">{{ __('Calendar') }}</h2>
                            <div class="stroke-shape"></div>
                        </div><!-- end block-card-header -->
                        <div class="block-card-body">

                            @if(is_null($pet->user->plan) || $pet?->user?->plan?->name == '3_listing')
                                <div style="backdrop-filter: blur(1px);background-color: #ffffff00;filter: blur(8px);">
                                    <div id='calendar'></div>
                                </div>
                            @else
                                <div id='calendar'></div>
                            @endif
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->

                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{ __('Pricing') }}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div>
                                <h1 class="mb-2 text-color-1">Price: ${{ $pet->price }}</h1>
                                <h5 class="text-color-1">{{ __('Price breeding') }}: ${{ $pet->price_breeding }}</h5>

                                @can('notAuthor', $pet)
                                    <div class="btn-box pt-3 w-">
                                        <a href="javascript:void(0)" wire:click="sendMessage" class="btn-gray mr-1"><i class="la la-comment mr-1"></i>{{ __('Write a message') }}</a>
                                    </div>
                                @endcan
                            </div>
                        </div><!-- end sidebar-widget -->

                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{ __('Shipping') }}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <span class="text-color-4 mr-2">{{ __('Delivery') }}:</span>

                            @if($pet?->shipping?->shipping_fee)
                                <span>{{ $pet?->shipping?->shipping_price }}</span>$
                            @else
                                <span>{{ __('Shipping destination') }}</span>
                            @endif
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <div class="section-tab section-tab-layout-2 mb-4">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="popular-tab" data-toggle="tab" href="#parents" role="tab" aria-controls="popular" aria-selected="true">
                                            {{ __('Parents') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="parents" role="tabpanel" aria-labelledby="popular-tab">
                                    @foreach($parents as $parent)
                                        <div class="mini-list-card">
                                            <div class="mini-list-img">
                                                <a href="{{ route('family.show', $parent->family) }}" class="d-block">
                                                    <img src="{{ $parent->family->getFirstMediaUrl('photo' , 'thumb') }}" alt="parent as pet - {{ $parent->family->name }}">
                                                </a>
                                            </div><!-- end mini-list-img -->
                                            <div class="mini-list-body">
                                                <h1 class="mini-list-title font-size-20 mb-3">
                                                    <a href="{{ route('family.show', $parent->family) }}">{{ $parent->family->name }}</a>
                                                </h1>
                                                <span>Breed: {{ $parent->family->breed->title }}</span>
                                                <span class="badge badge-dark">{{ $parent->family->who }}</span>
                                            </div><!-- end mini-list-body -->
                                        </div><!-- end mini-list-card -->
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    @push('scripts')

        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

        <script>

            document.addEventListener('DOMContentLoaded', function () {

                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {

                    aspectRatio: 3,
                    eventColor: '#378006',
                    displayEventTime: false,

                    events: {{ Js::from($events) }},

                    initialView: 'dayGridMonth',
                });

                //  calendar.addEvent({ title: 'new event', start: '2023-17-08' });

                calendar.render();
            });

        </script>

        <script>

            var cities = L.layerGroup();

            var marker = L.marker([{{ $pet->user->lat }}, {{ $pet->user->lng }}]).addTo(cities);

            var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
            var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

            var streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

            var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                minZoom: 3
            });


            var map = L.map('map', {
                center: ["{{ $pet->user->lat }}", "{{ $pet->user->lng }}"],
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
