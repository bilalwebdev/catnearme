<!-- ================================
        START CARD AREA
    ================================= -->
<section class="card-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <p class="sec__desc pb-2 ">{{ __('Discover Offers of our Verified Breeders') }}</p>
                    <h2 class="sec__title mb-0">{{ __('Kittens Available Now') }}</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-60px">
            <div class="col-lg-12">
                <div class="card-carousel owl-trigger-action">
                    @foreach($pets as $pet)
                        <div class="card-item border border-color">
                            <div class="card-image">
                                <a href="{{ route('listings.showslug', [$pet->breed->slug, $pet->slug]) }}" class="d-block">
                                    <img src="{{ $pet->getFirstMediaUrl('photo' , 'thumb') }}" class="card__img" alt="{{ $pet->title }}">
                                    <span class="badge">{{ $pet->created_at->isoFormat('LLL') }}</span>
                                </a>
                            </div>
                            <div class="card-content">
                                <a href="{{ route('user.breeder.profile', $pet->user) }}"
                                   class="user-thumb d-inline-block" data-toggle="tooltip"
                                   data-placement="top"
                                   title="{{ __('Breeder') }}: {{ $pet->user->username }}">
                                    <img src="{{ $pet->user->getFirstMediaUrl('avatar' , 'thumb') }}"
                                         alt="{{ __('Breed') }}: {{ $pet->user->username }}">
                                </a>
                                <h4 class="card-title pt-3">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('listings.showslug', [$pet->breed->slug, $pet->slug]) }}">{{ $pet->title }}</a>
                                        <img style="width: 30px" class="verified-pet"
                                             src="{{ Vite::asset('resources/images/home/shield.png') }}"
                                             alt="{{ __('Verified') }}" width="1">
                                    </div>
                                </h4>
                                <p class="card-sub"><a href="{{ route('listings' , ['country' => $pet->user->country]) }}"><i class="la la-map-marker mr-1 text-color-2"></i>{{ $pet->user->country->name }}</a></p>
                                <ul class="listing-meta d-flex align-items-center">
                                    <li class="d-flex align-items-center">
                                        <span class="rate flex-shrink-1">{{ $pet->user->averageRating(1) ?? 0.0 }}</span>
                                        <span class="rate-text">{{ $pet->user->numberOfReviews() }} {{ __('Ratings') }}</span>
                                    </li>
                                </ul>
                                <ul class="info-list padding-top-20px line-height-40">
                                    <li>
                                        <span class="la la-circle icon"></span>
                                        <a href="#"> {{ __('Breed') }}: <span class="badge badge-info p-2">
                                                {{ $pet->breed->title }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <span class="la la-circle icon"></span>
                                        <a href="#"> {{ __('Color') }}: <span>{{ $pet->color }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- end card-item -->
                    @endforeach
                </div><!-- end card-carousel -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
    END CARD AREA
================================= -->
