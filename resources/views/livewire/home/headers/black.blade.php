<header class="{{ request()->routeIs('home') ? 'header-area bg-dark position-relative top-auto' : 'header-area' }}" wire:ignore.self>
    <div class="header-top-bar bg-dark-opacity py-2 padding-right-30px padding-left-30px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center header-top-info font-size-14 font-weight-medium">
                    <p class="login-and-signup-wrap">
                        @auth
                            <a href="{{ route('dashboard') }}">
                                <span class="mr-1 la la-sign-in"></span>{{ __('My dashboard') }}
                            </a>
                        @elseguest
                            <a href="#" data-toggle="modal" data-target="#loginModal">
                                <span class="mr-1 la la-sign-in"></span>{{ __('Login') }}
                            </a>
                            <span class="or-text px-2">{{ __('or') }}</span>
                            <a href="#" data-toggle="modal" data-target="#signUpModal">
                                <span class="mr-1 la la-user-plus"></span>{{ __('Sign Up') }}
                            </a>
                        @endauth
                    </p>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6 d-flex align-items-center justify-content-end header-top-info">
                    <ul class="list-items list-items-style d-flex">
                        <li><a href="tel:{{ $setting->phone }} "><i class="la la-phone mr-1"></i>{{ $setting->phone }} SMS Only</a></li>
                    </ul>
                    <ul class="social-profile social-profile-colored pl-3">
                        <li><a href="{{ config('cat.social.facebook') }}" class="facebook-bg"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="{{ config('cat.social.youtube') }}" class="twitter-bg"><i class="lab la-youtube"></i></a></li>
                        <li><a href="{{ config('cat.social.instagram') }}" class="instagram-bg"><i class="lab la-instagram"></i></a></li>
                    </ul>
                </div>
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-top-bar -->
    <div class="header-menu-wrapper padding-right-30px padding-left-30px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-full-width">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" width="135" height="38">
                            </a>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('pets.add') }}" class="btn-gray add-listing-btn-show font-size-24 mr-2 flex-shrink-0" data-toggle="tooltip" data-placement="left" title="Add Pet Breed">
                                    <i class="la la-plus"></i>
                                </a>
                                <div class="menu-toggle">
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                </div><!-- end menu-toggle -->
                            </div>
                        </div><!-- end logo -->
                        <div class="quick-search-form d-flex align-items-center">
                            <form action="#" class="w-100">
                                <div class="header-search position-relative">
                                    <i class="la la-arrow-right form-icon"></i>
                                    <input type="search" placeholder="{{ __('Choose the desired breed') }}">
                                    <div class="instant-results">
                                        <ul class="instant-results-list overflow-auto height-500">
                                            @foreach($breeds as $breed)
                                                <li><a href="{{ route('listings.withbreed' ,$breed->slug) }}" class="d-flex align-items-center">{{ $breed->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end quick-search-form -->
                        <div class="main-menu-content ml-auto">
                            @include('__shared.home.header.nav')
                        </div><!-- end main-menu-content -->
                        <div class="nav-right-content">
                            @can('breeder')
                                <a href="{{ route('pets.add') }}" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                    <i class="la la-layer-group mr-2"></i>{{ __('Add Pet') }}
                                </a>
                            @elsecan('client')
                                <a href="{{ route('dashboard') }}" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                    <i class="la la-layer-group mr-2"></i>{{ __('My dashboard') }}
                                </a>
                            @endcan
                        </div><!-- end nav-right-content -->
                    </div><!-- end menu-full-width -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
