<style>
    .home-page-heading {
        text-align:center;
        width:100%;
        left: 50%;
        top: 30%;
        font-weight:900;
        font-size: 60px;
        position: absolute;
        transform: translate(-50%, -50%);
        color: #ffffff;
    }

    .home-page-subheading {
        text-align:center;
        width:100%;
        left: 50%;
        top: 50%;
        font-size: 20px;
        font-weight:400;
        position: absolute;
        transform: translate(-50%, 100%);
        color: #ffffff;
    }
</style>

<div>

    <livewire:home.headers.black />

    @if($video)
        <!-- ================================
        START HERO-WRAPPER AREA
        ================================= -->
        <section class="hero-wrapper hero-wrapper-4 pb-0">
            <!-- Easy as hell -->
            <div style="width: 100%; height: 70vh; margin-top: -280px" 
        data-vide-bg="{{ $video->getFirstMediaUrl('video') }}" 
            data-vide-options="{{ $video->position }}">
        <div style='position: absolute;
            background: rgba(0,0,0,0.4);
            height: 100%;
            width: 100%;'></div>
            <h1 class="heading-seo home-page-heading">Kittens For Sale & Cats For Adoption Near Me</h1>
                <p class="home-page-subheading">
                    Find Your Feline Friend Here.
                </p>
            </div>
        </section><!-- end hero-wrapper -->
        <!-- ================================
            END HERO-WRAPPER AREA
        ================================= -->
    @endif

    <livewire:home.sections.search />

    <livewire:home.sections.breeds />

    <livewire:home.sections.verify-breeders />

    <div class="section-block"></div>

    <livewire:home.sections.start/>

    <livewire:home.sections.join />

    <section class="mobile-app-area section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="mobile-app-content">
                        <div class="section-heading">
                            <div class="section-icon gradient-icon mb-3">
                                <svg id="Layer_5" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient id="svg-gradient11">
                                            <stop offset="5%" stop-color="#ff6b6b"></stop>
                                            <stop offset="95%" stop-color="#ffbb3d"></stop>
                                        </linearGradient>
                                    </defs>
                                    <path d="m63 33c0-6.689-4.718-12.29-11-13.668v-13.332c0-2.757-2.243-5-5-5h-26c-2.757 0-5 2.243-5 5v11h-5.781l-.603 2.416-2.134-1.281-5.348 5.345 1.281 2.136-2.415.603v7.562l2.416.603-1.282 2.136 5.347 5.346 2.134-1.281.604 2.415h5.781v15c0 2.757 2.243 5 5 5h26c2.757 0 5-2.243 5-5v-11.332c6.282-1.378 11-6.979 11-13.668zm-2 0c0 1.949-.477 3.785-1.305 5.414-.555-1.527-1.832-2.728-3.482-3.141l-4.213-1.054v-.239c1.246-.939 2-2.416 2-3.979v-2c0-1.397-.591-2.741-1.622-3.687-1.03-.943-2.426-1.417-3.822-1.294-2.555.221-4.556 2.501-4.556 5.187v1.793c0 1.563.754 3.04 2 3.979v.239l-4.213 1.054c-1.65.413-2.927 1.614-3.482 3.141-.828-1.628-1.305-3.464-1.305-5.413 0-6.617 5.383-12 12-12s12 5.383 12 12zm-15-13.668c-.688.151-1.354.359-2 .607v-2.939h-20v14h11.16c-.095.655-.16 1.319-.16 2 0 6.689 4.718 12.29 11 13.668v2.332h-24v-34h24zm-10.41 9.668h-9.59v-10h16v1.894c-3.054 1.773-5.38 4.659-6.41 8.106zm-14.59-26h26c1.654 0 3 1.346 3 3v3h-32v-3c0-1.654 1.346-3 3-3zm-5 31.572c-.631.278-1.312.428-2 .428-2.757 0-5-2.243-5-5s2.243-5 5-5c.688 0 1.369.15 2 .428zm-4.219 6.428-.487-1.949-.203-.535-1.142-.464-2.158 1.296-3.138-3.139 1.296-2.159-.5-1.22-2.449-.611v-4.438l2.446-.611.503-1.22-1.296-2.159 3.138-3.139 2.158 1.296 1.22-.496.612-2.452h4.219v4.305c-.649-.195-1.321-.305-2-.305-3.86 0-7 3.141-7 7s3.14 7 7 7c.679 0 1.351-.11 2-.305v4.305zm35.219 20h-26c-1.654 0-3-1.346-3-3v-3h32v3c0 1.654-1.346 3-3 3zm3-8h-32v-42h32v8.051c-.332-.024-.662-.051-1-.051s-.668.027-1 .051v-6.051h-28v38h28v-4.051c.332.024.662.051 1 .051s.668-.027 1-.051zm-1-8c-3.585 0-6.799-1.589-9-4.089v-.788c0-1.379.935-2.576 2.272-2.911l5.728-1.431v-2.911l-.497-.289c-.941-.548-1.503-1.513-1.503-2.581v-1.793c0-1.659 1.199-3.062 2.729-3.195.858-.069 1.671.201 2.298.776.618.567.973 1.373.973 2.212v2c0 1.068-.562 2.033-1.503 2.581l-.497.289v2.911l5.728 1.431c1.337.335 2.272 1.532 2.272 2.911v.788c-2.201 2.5-5.415 4.089-9 4.089z"></path><path d="m38 5h2v2h-2z"></path><path d="m28 5h8v2h-8z"></path><path d="m30 57h8v2h-8z"></path><path d="m44 57h2v2h-2z"></path><path d="m22 57h2v2h-2z"></path><path d="m24 33h9v2h-9z"></path><path d="m24 37h9v2h-9z"></path><path d="m24 41h9v2h-9z"></path><path d="m24 45h9v2h-9z"></path><path d="m57 19c1.654 0 3-1.346 3-3 0-1.302-.839-2.402-2-2.816v-8.184h-2v8.184c-1.161.414-2 1.514-2 2.816 0 1.654 1.346 3 3 3zm0-4c.551 0 1 .448 1 1s-.449 1-1 1-1-.448-1-1 .449-1 1-1z"></path><path d="m56 1h2v2h-2z"></path><path d="m11 45c-1.654 0-3 1.346-3 3 0 1.302.839 2.402 2 2.816v8.184h2v-8.184c1.161-.414 2-1.514 2-2.816 0-1.654-1.346-3-3-3zm0 4c-.551 0-1-.448-1-1s.449-1 1-1 1 .448 1 1-.449 1-1 1z"></path><path d="m10 61h2v2h-2z"></path>
                                </svg>
                            </div>
                            <h2 class="sec__title mb-3">Why become Verified?</h2>
                            <p class="sec__desc font-size-17 margin-bottom-35px">
                                Here are just some of the  benefits verified breeders enjoy:
                            </p>
                        </div><!-- end section-heading -->
                        <ul class="info-list contact-links line-height-60">
                            <li class="d-flex align-items-center mb-2 font-size-20">▼  Dispel your client’s fears about fake listings.</li>
                            <li class="d-flex align-items-center mb-2 font-size-20">▼  Your posts will be randomly shown on our front page carousel.</li>
                            <li class="d-flex align-items-center mb-2 font-size-20">▼  Extend your post limit and duration.</li>
                            <li class="d-flex align-items-center mb-2 font-size-20">▼  Your posts will get priority showing on the breeder’s list.</li>
                            <li class="d-flex align-items-center mb-2 font-size-20">▼  Have access to a Birth Calendar.</li>
                        </ul>
                        <div class="btn-box margin-top-40px">
                            <a href="{{ route('pets.add') }}" class="theme-btn download-btn mr-2 bg-1 text-white hover-scale-2 mb-2">Add listing</a>
                            <a href="{{ route('dashboard.listing') }}" class="theme-btn download-btn bg-2 text-white hover-scale-2 mb-2">My Listings</a>
                        </div><!-- end btn-box -->
                    </div>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-5">
                    <div class="mobile-img">
                        <img class="lazy" src="{{ Vite::asset('resources/images/home/shield.png') }}" alt="map-img" style="">
                    </div><!-- end mobile-img -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <livewire:home.sections.pricing />

    <div class="section-block"></div>

    <livewire:home.sections.blog />

    @push('scripts')
        <script src="{{ asset('assets/home/js/jquery.vide.min.js') }}"></script>
    @endpush

</div>
