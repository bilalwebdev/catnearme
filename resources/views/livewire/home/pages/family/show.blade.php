<div>

    <livewire:home.headers.white />

    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area bg-gray user-bread-bg py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content breadcrumb-content-2 d-flex flex-wrap align-items-end justify-content-between">
                        <div class="section-heading">

                            <div class="user-bio margin-bottom-30px">
                                <a href="{{ route('user.breeder.profile', $family->user) }}" class="d-flex align-items-center">
                                    <div class="user-thumb user-thumb-md mr-3">
                                        <img src="{{ $family->getFirstMediaUrl('photo' , 'thumb') }}" alt="{{ $family->title }}">
                                    </div>
                                    <div class="user-inner-bio">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="author__title mr-1">{{ $family->user->username }}</h4>
                                            @if($family->user->is_verify)
                                                <div class="shield-user">
                                                    <img src="{{ Vite::asset('resources/images/home/shield-transparent.png') }}" width="100">
                                                </div>
                                            @endif
                                        </div>
                                        <p class="author__meta">{{ $family->user->country->name }}</p>
                                    </div>
                                </a>
                            </div>

                            <div class="d-flex align-items-center pt-1">
                                <h2 class="sec__title mb-0">{{ $family->title }}</h2>
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="star-rating-wrap d-flex align-items-center">
                                    <div class="star-rating text-color-5 font-size-18">
                                        @for($rating = 0; $rating < $family->user->averageRating(); $rating++)
                                            <span><i class="la la-star"></i></span>
                                        @endfor
                                    </div>
                                    <p class="font-size-14 pl-2 font-weight-medium">{{ $family->user->reviews->count() }} {{ __('reviews') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-box d-flex align-items-center">
                            <span class="btn-gray mr-2"><i class="la la-eye mr-1"></i>{{ __('Viewed') }} - {{ $family->user->views }}</span>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->


    <!-- ================================
    START USER-DETAILS AREA
    ================================= -->
    <section class="user-detail-area padding-top-60px padding-bottom-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="user-listing-detail-wrap">
                        <div class="block-card mb-5">
                            <div class="block-card-header">
                                <h2 class="widget-title pb-0">Description</h2>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <p class="pb-3 font-weight-medium line-height-30" style="word-break: break-word">
                                    {{ $family->description }}
                                </p>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->

                        <div class="block-card mb-5">
                            <div class="block-card-header">
                                <h2 class="widget-title pb-0">Health</h2>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <p class="pb-3 font-weight-medium line-height-30" style="word-break: break-word">
                                    {{ $family->health }}
                                </p>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->

                        <div class="block-card mb-5">
                            <div class="block-card-header">
                                <h2 class="widget-title pb-0">Awards</h2>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <p class="pb-3 font-weight-medium line-height-30">
                                    {{ $family->awards }}
                                </p>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->


                    </div><!-- end listing-detail-wrap -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">

                        <div class="sidebar-widget">
                            <h3 class="widget-title">Information</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="block-card-body line-height-35">
                                <p>{{ __('Breed') }}: {{ $family->breed->title }}</p>
                                <p>{{ __('Color') }}: {{ $family->color }}</p>
                                <p>{{ __('Age') }}: {{ $family->age }}</p>
                                <p>{{ __('Size') }}: {{ $family->size }}</p>
                                <p>{{ __('Sire') }}: {{ $family->sire ?? 'not info' }}</p>
                                <p>{{ __('Dam') }}: {{ $family->dam ?? 'not info' }}</p>
                            </div><!-- end block-card-body -->
                        </div><!-- end sidebar-widget -->

                        <div class="sidebar-widget">
                            <h3 class="widget-title">Photos</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="block-card-body">
                                <div class="full-screen-slider owl-trigger-action owl-trigger-action-2" wire:ignore>
                                    @foreach($family->getMedia('photos') as $gallery)
                                        <a href="{{ $gallery->getUrl('gallery') }}" class="fs-slider-item d-block" data-fancybox="gallery" data-caption="Showing image - 01">
                                            <img src="{{ $gallery->getUrl('gallery') }}" alt="single listing image">
                                        </a><!-- end fs-slider-item -->
                                    @endforeach
                                </div>
                            </div><!-- end block-card-body -->
                        </div><!-- end sidebar-widget -->


                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- ================================
        END USER-DETAILS AREA
    ================================= -->
</div>
