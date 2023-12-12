<div>
    <livewire:home.headers.black/>

    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area  bread-overlay overflow-hidden" style="background-image: url('{{ Vite::asset('resources/images/bg/breeds.jpg') }}')">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                            <div class="section-heading">
                                <h2 class="sec__title text-white font-size-40 mb-0">{{ $seo->heading }}</h2>
                            </div>
                            {{ Breadcrumbs::view('partials/breadcrumbs-list' , 'breeds') }}
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 1200 150"
                 preserveAspectRatio="none">
                <g>
                    <path fill-opacity="0.2"
                          d="M0,150 C600,100 1000,50 1200,-1.13686838e-13 C1200,6.8027294 1200,56.8027294 1200,150 L0,150 Z"></path>
                </g>
                <g class="pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="300">
                    <path fill="rgba(255,255,255,0.8)"
                          d="M0,150 C600,120 1000,80 1200,30 C1200,36.8027294 1200,76.8027294 1200,150 L0,150 Z"></path>
                </g>
                <path fill="#fff"
                      d="M0,150 C600,136.666667 1000,106.666667 1200,60 C1200,74 1200,104 1200,150 L0,150 Z"></path>
                <defs></defs>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->

    <section class="category-area section--padding">
        <div class="container">
            <div class="row">
                @foreach($breeds as $breed)
                    <div class="col-lg-3 responsive-column">
                        <div class="category-item overflow-hidden">
                            <img src="{{ $breed->getFirstMediaUrl('photo' , 'thumb') }}" data-src="{{ $breed->getFirstMediaUrl('photo' , 'thumb') }}" alt="category-image" class="cat-img lazy">
                            <div class="category-content d-flex align-items-center justify-content-center">
                                <a href="{{ route('listings.withbreed' ,$breed->slug) }}" class="category-link d-flex flex-column justify-content-center w-100 h-100">
                                    <div class="cat-content">
                                        <h4 class="cat__title mb-3">{{ $breed->title }}</h4>
                                        <span class="badge">{{ $breed->listings()->active()->count() }} Listings</span>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end category-item -->
                    </div><!-- end col-lg-3 -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end category-area -->

    <div class="col-lg-12 text-center mb-4">
       {{ $breeds->links() }}
    </div>
</div>
