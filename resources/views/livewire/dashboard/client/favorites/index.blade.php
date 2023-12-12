<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('Save pets') }}</h2>
            </div>
            {{ Breadcrumbs::render('favorites') }}
        </div><!-- end breadcrumb-content -->
        <div class="col-lg-12">
            <div class="block-card dashboard-card mb-4">
                <div class="block-card-header">
                    <h2 class="widget-title pb-0">{{ __('Favorites') }}</h2>
                </div>
                <div class="block-card-body">
                    <div class="row">
                        @forelse($favorites as $favorite)
                            <div class="col-lg-6">
                                <div class="card-item card-item-list card-item--list">
                                    <div class="card-image">
                                        <a href="{{ route('listings.show', $favorite->pet) }}" class="d-block">
                                            <img src="{{ $favorite->pet->getFirstMediaUrl('photo' , 'thumb') }}" data-src="{{ $favorite->pet->getFirstMediaUrl('photo' , 'thumb') }}" class="card__img lazy" alt="">
                                            <span class="badge">{{ $favorite->pet->breed->title }}</span>
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <h1 class="card-title"><a href="{{ route('listings.show', $favorite->pet) }}">{{ $favorite->pet->title }}</a></h1>
                                        <div class="mt-8">
                                            <div class="d-flex flex-column line-height-35">
                                                <span>{{ __('Age') }}: {{ $favorite->pet->age }}</span>
                                                <span>{{ __('Gender') }}: {{ $favorite->pet->gender }}</span>
                                                <span>{{ __('Color') }}: {{ $favorite->pet->color }}</span>
                                            </div>
                                            <hr>
                                            <div class="inline-flex">
                                                <h4 class="mb-3">{{ __('Price') }}: ${{ $favorite->pet->price }}</h4>
                                            </div>

                                            <p class="pt-3">
                                                <span class="badge badge-dark p-2">{{ $favorite->pet->created_at->isoFormat('LLL') }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- end card-item -->
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-center height-500 flex-column">
                                    <div class="mb-5">
                                        <img src="{{ asset('images/info.png') }}" alt="" width="120">
                                    </div>
                                    <h3 class="mb-2">{{ __('Not favorites pets') }}</h3>
                                    <p>{{ __('Start browsing the listings in the listing and click add favorites and your saved listings will be summarized here') }}</p>

                                    <div class="btn-box pt-5">
                                        <a href="{{ route('listings') }}" class="theme-btn gradient-btn border-0">Go listings<i class="la la-arrow-right ml-2"></i></a>
                                    </div>

                                </div>
                            </div>
                        @endforelse
                    </div>
                </div><!-- end block-card-body -->

                <div class="col-lg-12 pb-4">
                    <div class="text-center">
                        {{ $favorites->links() }}
                    </div>
                </div><!-- end col-lg-12 -->

            </div><!-- end block-card -->
        </div><!-- end col-lg-12 -->
    </div><!-- end dashboard-inner-body-container -->
</div>
