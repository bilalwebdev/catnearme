<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('Reviews') }}</h2>
            </div>
            {{ Breadcrumbs::render('reviews') }}
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-header">
                        <h2 class="widget-title pb-0">Your Reviews</h2>
                    </div>
                    <div class="block-card-body">

                        @if($reviews->isEmpty())
                            <div class="height-500 d-flex align-items-center justify-content-center flex-column">
                                <div class="text-center">
                                    <div class="mb-5">
                                        <img src="{{ asset('images/info.png') }}" alt="" width="120">
                                    </div>
                                    <h1 class="mb-2">{{ __('You don\'t have any reviews yet') }}</h1>
                                    <p>{{ __('As soon as someone leaves a review, it will appear here') }}</p>
                                    <div class="btn-box pt-5">
                                        <a href="{{ route('home') }}" class="theme-btn gradient-btn border-0">Go home<i class="la la-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @else
                           <div class="comments-list reviews-list">
                            @foreach($reviews as $review)
                                <div class="comment">
                                    <div class="user-thumb user-thumb-lg flex-shrink-0">
                                        <img src="{{ $review->author->getFirstMediaUrl('avatar' , 'thumb') }}">
                                    </div>
                                    <div class="comment-body w-100">
                                        <div class="d-flex  justify-content-between">
                                            <h4 class="comment__title"><span>{{ $review->author->username }}</span></h4>
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
                            @endforeach
                        </div><!-- end comments-list-->
                       @endif
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div><!-- end col-lg-12 -->
            <div class="col-lg-12 pb-4">
                <div class="text-center">
                    {{ $reviews->links() }}
                </div>
            </div><!-- end col-lg-12 -->
        </div>

    </div>
</div>
