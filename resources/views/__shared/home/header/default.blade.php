<!-- ================================
            START HEADER AREA
================================= -->
<style>
.main-menu ul li {

    padding-right: 15px !important;

}
@media (min-width: 1201px) and (max-width: 1250px) {
theme-btn.gradient-btn.shadow-none.add-listing-btn-hide{
font-size:10px;
font-weight:400px 
}
}
</style>
<header class="header-area bg-dark position-relative top-auto">
    <div class="header-top-bar py-2 border-bottom border-bottom-color padding-right-30px padding-left-30px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center header-top-info font-size-14 font-weight-medium">
{{--                    <div class="user-chosen-select-container mr-3">
                        <select class="user-chosen-select">
                            <option value="1" selected>English</option>
                            <option value="2">Espanol</option>
                            <option value="3">Deutsch</option>
                            <option value="4">Türkçe</option>
                            <option value="5">Polski</option>
                            <option value="6">Português</option>
                            <option value="7">Italiano</option>
                            <option value="8">Dansk</option>
                            <option value="9">French</option>
                            <option value="10">German</option>
                        </select>
                    </div>--}}
                    <p class="login-and-signup-wrap">
                        @auth
                            <a href="{{ route('dashboard') }}">
                                <span class="mr-1 la la-sign-in"></span>{{ __('Go dashboard') }}
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
                        <li><i class="la la-map-marker mr-1"></i>Brooklyn, NY, US.</li>
                        <li><a href="tel:+1-800-732-1521"><i class="la la-phone mr-1"></i>+1 (954)-800-3328 SMS Only</a></li>
                    </ul>
                    <ul class="social-profile social-profile-colored pl-3">
                        <li><a href="#" class="facebook-bg"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="#" class="twitter-bg"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#" class="instagram-bg"><i class="lab la-instagram"></i></a></li>
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
                                <a href="add-listing.html" class="btn-gray add-listing-btn-show font-size-24 mr-2 flex-shrink-0" data-toggle="tooltip" data-placement="left" title="Add Pet Breed">
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
                                    <i class="la la-search form-icon"></i>
                                    <input type="search" placeholder="{{ __('What are you looking for?') }}">
                                    <div class="instant-results">
                                        <ul class="instant-results-list">
                                            <li><a href="#" class="d-flex align-items-center"><span class="icon-element bg-1 mr-2"><i class="la la-glass"></i></span>Food & Drinks</a></li>
                                            <li><a href="#" class="d-flex align-items-center"><span class="icon-element bg-2 mr-2"><i class="la la-hotel"></i></span>Travel & Hotel</a></li>
                                            <li><a href="#" class="d-flex align-items-center"><span class="icon-element bg-3 mr-2"><i class="la la-cutlery"></i></span>Restaurants</a></li>
                                            <li><a href="#" class="d-flex align-items-center"><span class="icon-element bg-4 mr-2"><i class="la la-television"></i></span>Entertainment</a></li>
                                            <li><a href="#" class="d-flex align-items-center"><span class="icon-element bg-5 mr-2"><i class="la la-shopping-bag"></i></span> Shopping</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end quick-search-form -->
                        <div class="main-menu-content ml-auto">
                            @include('__shared.home.header.nav')
                        </div><!-- end main-menu-content -->
                        <div class="nav-right-content">
                            <a href="{{ route('pets.add') }}" class="theme-btn gradient-btn shadow-none add-listing-btn-hide">
                                <i class="la la-layer-group mr-2"></i>{{ __('Add Pet') }}
                            </a>
                        </div><!-- end nav-right-content -->
                    </div><!-- end menu-full-width -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->
