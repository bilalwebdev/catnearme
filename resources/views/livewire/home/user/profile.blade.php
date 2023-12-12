<div>

    <livewire:home.headers.white />

    <!-- ================================
        START BREADCRUMB AREA
    ================================= -->
    <section class="breadcrumb-area bg-gray user-bread-bg pt-3 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-end justify-content-between">

                        <div class="section-heading">

                            <div class="user-bio margin-bottom-30px">
                                <a href="{{ route('listings' , ['country' => $user->country]) }}" class="d-flex align-items-center">
                                    <div class="user-thumb user-thumb-md mr-3">
                                        <img src="{{ $user->getFirstMediaUrl('avatar' , 'thumb') }}" alt="{{ $user->username }}">
                                    </div>
                                    <div class="user-inner-bio">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="author__title mr-1">{{ $user->username }}</h4>

                                            @if($user->is_verify)
                                                <div class="shield-user">
                                                    <img src="{{ Vite::asset('resources/images/home/shield-transparent.png') }}" width="100">
                                                </div>
                                            @endif
                                        </div>
                                        <p class="author__meta">{{ $user->country->name }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="star-rating-wrap d-flex align-items-center">
                                    <div class="star-rating text-color-5 font-size-18">
                                        @for($rating = 0; $rating < $user->averageRating(); $rating++)
                                            <span><i class="la la-star"></i></span>
                                        @endfor
                                    </div>
                                    <p class="font-size-14 pl-2 font-weight-medium">{{ $user->numberOfReviews() }} {{ __('reviews') }}</p>
                                </div>
                            </div>
                            <div class="badge badge-warning font-size-22 mt-3">{{ $user->averageRating(1) ?? 0.0 }}</div>
                        </div>


                        <div class="btn-box bread-btns d-flex align-items-center pb-3">
                            <span class="btn-gray mr-2"><i class="la la-file-text-o mr-1"></i><span class="text-color font-weight-semi-bold mr-1">{{ $user->pets->count() }}</span>{{ __('Listings kitten') }}</span>
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
                                <h2 class="widget-title pb-0">{{ __('About Me') }}</h2>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <p class="pb-3 font-weight-medium line-height-30">
                                    {{ $user->about_me }}
                                </p>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="section-heading pb-1">
                            <h2 class="sec__title font-size-24 line-height-30">{{ $user->username }} {{ __('Listings') }}</h2>
                        </div><!-- end section-heading -->
                        <div class="row pb-3">
                            @foreach($pets as $pet)
                                <div class="col-lg-6 responsive-column">
                                    <div class="card-item">
                                        <div class="card-image">
                                            <a href="{{ route('listings.show', $pet) }}" class="d-block">
                                                <img src="{{ $pet->getFirstMediaUrl('photo' , 'thumb') }}" data-src="{{ $pet->getFirstMediaUrl('photo' , 'thumb') }}" class="card__img lazy" alt="" width="270" height="270">
                                                <span class="badge">{{ $pet->created_at->isoFormat('LLL') }}</span>
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title pt-3">
                                                <a href="{{ route('listings.show', $pet) }}">{{ $pet->title }}</a>
                                            </h4>
                                            <p class="card-sub"><a href="{{ route('listings' , ['country' => $pet->user->country]) }}"><i class="la la-map-marker mr-1 text-color-2"></i>{{ $pet->user->country->name }}</a></p>
                                            <hr>
                                            <div>
                                                <ul class="mb-3 line-height-35">
                                                    <li>{{ __('Breed') }}: <a href="{{ route('listings' , ['breed' => $pet->breed]) }}">{{ $pet->breed->title }}</a></li>
                                                    <li>{{ __('Color') }}: {{ $pet->color }}</li>
                                                    <li>{{ __('Gender') }}: {{ $pet->gender }}</li>
                                                    <li>{{ __('Age') }}: {{ $pet->age }}</li>
                                                </ul>
                                                <h3 class="mb-1">{{ __('Price') }}: {{ $pet->price }}$</h3>
                                                <span>{{ __('Price of breeding') }}: <b>{{ $pet->price_breeding }}</b>$</span>
                                            </div>
                                        </div>
                                    </div><!-- end card-item -->
                                </div><!-- end col-lg-6 -->
                            @endforeach
                            <div class="col-lg-12 pt-3 text-center">
                                {{ $pets->links() }}
                            </div><!-- end col-lg-12 -->
                        </div><!-- end row -->
                    </div><!-- end listing-detail-wrap -->


                    @if($user->reviews)
                        <div class="user-reviews">
                            <div class="section-heading pb-1">
                                <h2 class="sec__title font-size-24 line-height-30">{{ __('Reviews') }} ({{ $pet->user->numberOfReviews() }})</h2>
                            </div><!-- end section-heading -->
                            <div class="comments-list reviews-list">
                                @forelse($user->reviews as $review)
                                    <div class="comment">
                                        <div class="user-thumb user-thumb-lg flex-shrink-0">
                                            <img src="{{ $review->author->getFirstMediaUrl('avatar' , 'thumb')  }}" alt="{{ $review->author->username }}">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h4 class="comment__title"><span>{{ $review->author->username }}</span></h4>
                                                    <span class="comment__meta">{{ $review->author->type }}</span>

                                                    @if(auth()->check() && auth()->id() === $review->author->id)
                                                        <span class="comment__meta text-danger" wire:click="deleteReview('{{ $review->id }}')"><i class="la la-trash mr-2 font-size-18"></i></span>
                                                    @endif
                                                </div>
                                                <div class="star-rating-wrap text-center">
                                                    <div class="star-rating text-color-5 font-size-18">
                                                        @for($rate = 0; $rate < $review->rating; $rate++ )
                                                            <span><i class="la la-star"></i></span>
                                                        @endfor
                                                    </div>
                                                    <p class="font-size-13 font-weight-medium">{{ $review->created_at->isoFormat('LLL') }}</p>
                                                </div>
                                            </div>
                                            <p class="comment-desc">
                                                {{ $review->review }}
                                            </p>
                                        </div>
                                    </div><!-- end comment -->
                                @empty
                                    <p class="font-size-18 text-color-1">{{ __('There are currently no reviews for this user') }}</p>
                                @endforelse
                            </div><!-- end comment-list -->
                        </div>
                    @endif
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{ __('User Contact') }}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="list-items list--items list--items-2 list-items-style-2">
                                <li><span class="text-color mr-1"><i class="la la-map-marker mr-2 text-color-2 font-size-18"></i>{{ __('Address') }}:</span>{{ $user->address }}</li>
                                <li><span class="text-color mr-1"><i class="la la-phone mr-2 text-color-2 font-size-18"></i>{{ __('Phone') }}:</span><a href="tel:{{ $user->phone_number }}">{{ $user->phone_number }}</a></li>
                                <li><span class="text-color mr-1"><i class="la la-envelope mr-2 text-color-2 font-size-18"></i>{{ __('Mail') }}:</span><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>
                            </ul>

                           @can('notAuthor', $pet)
                                <a  class="btn-gray mt-4" href="javascript:void(0)" wire:click="sendMessage" ><i class="la la-envelope mr-1"></i> {{ __('Write Message') }}</a>
                           @endif

                        </div><!-- end sidebar-widget -->

                        @can('client')
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{ __('Add Review') }}</h3>
                            <div class="stroke-shape mb-1"></div>

                            <div class="add-rating-bars review-bars d-flex mb-3 mt-3">
                                <div class="review-bars-inner">
                                    <form class="leave-rating MultiFile-intercepted w-100">
                                        <input type="radio" name="rating" id="rating-1" value="5">
                                        <label for="rating-1" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="rating-2" value="4">
                                        <label for="rating-2" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="rating-3" value="3">
                                        <label for="rating-3" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="rating-4" value="2">
                                        <label for="rating-4" class="fa fa-star"></label>
                                        <input type="radio" name="rating" id="rating-5" value="1">
                                        <label for="rating-5" class="fa fa-star"></label>
                                    </form>
                                </div>
                            </div>

                            <form wire:submit.prevent="sendReview" class="form-box">
                                <div class="input-box">
                                    <div class="form-group">
                                        <x-home.ui.textarea class="form-control-styled" title="Message" placeholder="{{ __('Write message') }}" wire:model.defer="review.text" />
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <button type="submit" class="theme-btn gradient-btn w-100 border-0">
                                        {{ __('Submit') }} <i class="la la-arrow-right ml-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div><!-- end sidebar-widget -->
                        @endcan
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- ================================
        END USER-DETAILS AREA
    ================================= -->

    @push('scripts')
        <script src="{{ asset('assets/home/js/rating-script.js') }}"></script>

        <script>
            $('input[name="rating"]').click(function () {
                const rate = $(this).val()

                @this.set('review.rate', rate)
            })
        </script>
    @endpush
</div>
