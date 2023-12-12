<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area bg-dark pattern-bg before-none padding-top-30px padding-bottom-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-content d-flex align-items-center justify-content-between p-0">
                    @can('breeder')
                        <div class="section-heading">
                            <h2 class="sec__title mb-0 font-size-24 line-height-30 text-white">{{ __('Become a breeder') }}</h2>
                            <p class="sec__desc font-size-16 text-white-50">{{ __('Place your animal ads conveniently') }}</p>
                        </div><!-- end section-heading -->
                        <div class="form-box text-sm-center">
                            <a href="{{ route('pets.add') }}" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                <i class="la la-layer-group mr-2"></i>Add Pet
                            </a>
                        </div>
                    @elsecan('client')
                        <div class="section-heading">
                            <h2 class="sec__title mb-0 font-size-24 line-height-30 text-white">{{ __('Find the best kitten') }}</h2>
                            <p class="sec__desc font-size-16 text-white-50">{{ __('Use the handy listing to find the right kitten for you') }}</p>
                        </div><!-- end section-heading -->
                        <div class="form-box text-sm-center">
                            <a href="{{ route('listings') }}" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                <i class="la la-layer-group mr-2"></i>{{ __('Go listing') }}
                            </a>
                        </div>
                    @endcan
                </div><!-- end cta-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="section-block-2 margin-top-30px margin-bottom-30px"></div>
        <div class="row">
            <div class="col-lg-3 responsive-column">
                <div class="footer-item footer-item-2">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}" class="foot-logo">
                            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="{{ $setting->site_name }} " width="170">
                        </a>
                    </div><!-- end footer-logo -->
                    <p class="footer__desc">
                        {{ $setting->footer_text }}
                    </p>
                    <p class="footer__desc">
                        <a href="{{ route('listings') }}" class="btn-text">View on the map <i class="la la-arrow-right icon"></i></a>
                    </p>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item footer-item-2">
                    <h4 class="footer__title text-white">Quick Links</h4>
                    <div class="stroke-shape mb-3"></div>
                    <ul class="list-items">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#signUpModal">Sign Up</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#loginModal">Log In</a></li>
                        <li><a href="{{ route('pets.add') }}">Add Listing</a></li>
                        <li><a href="{{ route('contacts') }}">Contact Us</a></li>
                        <li><a href="{{ route('page.locations') }}">All Locations</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item footer-item-2">
                    <h4 class="footer__title text-white">Breeds</h4>

                    <div class="stroke-shape mb-3"></div>
                    <ul class="list-items">
                        @foreach($breeds as $breed)
                            <li>
                                <a href="{{ route('listings.withbreed' ,$breed->slug) }}">{{ $breed->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column">
                <div class="footer-item footer-item-2">
                    <h4 class="footer__title text-white">{{ __('Contact with Us') }}</h4>
                    <div class="stroke-shape mb-3"></div>
                    <ul class="list-items contact-links">
                        <li><span class="d-block text-white mb-1"><i class="la la-phone mr-1 text-color-2"></i>{{ __('Phone') }}:</span><a href="tel:+1 (954)-800-3328">+1 (954)-800-3328 SMS Only</a></li>
                        <li><span class="d-block text-white mb-1"><i class="la la-envelope mr-1 text-color-2"></i>{{ __('Email') }}:</span><a href="mailto:admin@catnear.me">admin@catnear.me</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row pt-4 align-items-center">
            <div class="col-lg-4">
                <ul class="social-profile social-profile-colored">
                    <li><a href="{{ config('cat.social.facebook') }}" class="facebook-bg"><i class="lab la-facebook-f"></i></a></li>
                    <li><a href="{{ config('cat.social.youtube') }}" class="twitter-bg"><i class="lab la-youtube"></i></a></li>
                    <li><a href="{{ config('cat.social.instagram') }}" class="instagram-bg"><i class="lab la-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="section-block-2 margin-top-30px margin-bottom-30px"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="copy-right d-flex align-items-center justify-content-between">
                    <p class="copy__desc">
                        © Copyright CatNearMe <?=date('Y');?>
                    </p>
                    <ul class="list-items term-list term-list-2 text-right">
                        <li class="font-size-14"><a href="{{ route('page.info' , 'terms-and-conditions') }}">Terms & Conditions</a></li>
                        <li class="font-size-14"><a href="{{ route('page.info' , 'privacy-policy') }}">Privacy Policy</a></li>
                    </ul>
                </div><!-- end copy-right -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->
