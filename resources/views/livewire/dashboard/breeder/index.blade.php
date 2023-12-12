<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">Welcome, {{ auth()->user()->username }}!</h2>
            </div>
            {{ Breadcrumbs::render('dashboard') }}
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card-item dashboard-stat">
                    <div class="card-content">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="card-title font-size-40 text-color-4">{{ auth()->user()->pets()->active()->count() }} / <span class="text-color-5 opacity-5">{{ auth()->user()->pets()->Notactive()->count() }}</span></h2>
                                <p class="card-sub font-size-18 line-height-24">Listings Active/Not Active</p>
                            </div>
                            <div class="col-auto font-size-60">
                                <i class="la la-map-marked text-primary"></i>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end card-content -->
                </div><!-- end card-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="card-item dashboard-stat">
                    <div class="card-content">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="card-title font-size-40">{{ auth()->user()->views }}</h2>
                                <p class="card-sub font-size-18 line-height-24">Total Views</p>
                            </div>
                            <div class="col-auto font-size-60">
                                <i class="la la-eye text-success"></i>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end card-content -->
                </div><!-- end card-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="card-item dashboard-stat">
                    <div class="card-content">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="card-title font-size-40">{{ auth()->user()->numberOfRatings() }}</h2>
                                <p class="card-sub font-size-18 line-height-24">Total Reviews</p>
                            </div>
                            <div class="col-auto font-size-60">
                                <i class="la la-star-o text-info"></i>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end card-content -->
                </div><!-- end card-item -->
            </div><!-- end col-lg-3 -->

            <div class="col-lg-3 col-md-6">
                <div class="card-item dashboard-stat">
                    <div class="card-content gradient-bg-3" style="border-left: 3px solid blue">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title font-size-18">{{ __('My plan') }}: {{ auth()->user()->plan->title }}</h5>
                                <p class="card-sub font-size-14 line-height-24">{{ __('Limit post listing') }}: {{ auth()->user()->plan->feature->limit }}</p>
                                <p class="card-sub font-size-14 line-height-24">{{ __('Days Long') }}: {{ auth()->user()->plan->feature->days_long }}</p>
                            </div>
                            <div class="col-auto font-size-60">
                                <div class="btn-box pt-0">
                                    <a href="{{ route('dashboard.switch.plan') }}" class="theme-btn gradient-btn border-0">{{ __('Switch plan') }}<i class="la la-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end card-content -->
                </div><!-- end card-item -->
            </div><!-- end col-lg-3 -->

            <div class="col-lg-12">
                <div class="block-card dashboard-card mb-4 px-0 pb-0">
                    <div class="block-card-header px-4">
                        <h2 class="widget-title pb-0">{{ __('Messages') }}</h2>
                    </div>
                    <div class="block-card-body pt-0">
                        @if($conversations->isEmpty())
                            <div class="d-flex align-items-center justify-content-center flex-column height-500">
                                <div class="text-center">
                                    <div class="mb-5">
                                        <img src="{{ asset('images/info.png') }}" alt="" width="120">
                                    </div>
                                    <h1 class="mb-2">{{ __('No messages') }}</h1>
                                    <p>{{ __('You do not have any messages at the moment, please wait for other users to create a dialog with you.') }}</p>
                                    <div class="btn-box pt-5">
                                        <a href="{{ route('home') }}" class="theme-btn gradient-btn border-0">Go home<i class="la la-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="generic-list msg-from-customer">
                                @foreach($conversations as $dialog)
                                    <a class="generic-list-item d-flex align-items-center" href="{{ route('dashboard.chat' , ['conversation' => $dialog->id]) }}">
                                        <div class="user-thumb flex-shrink-0 position-relative">
                                            <img src="{{ $dialog->messageable->getFirstMediaUrl('avatar' , 'thumb') }}" alt="author-image">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="ml-2">
                                            <p class="text-truncate text-color font-size-14 font-weight-medium">{{ $dialog?->conversation->last_message->body ?? __('No message')}}</p>
                                            <p class="small text-gray">{{ $dialog?->conversation->last_message->sender->username }} - {{ $dialog?->conversation->last_message->created_at->diffForHumans() }}</p>
                                        </div>
                                    </a>
                                @endforeach
                                <a class="dropdown-item text-center small text-gray font-weight-medium py-2" href="{{ route('dashboard.chat') }}">View More <i class="la la-arrow-right ml-1"></i></a>
                            </div><!-- end generic-list -->
                        @endif
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div><!-- end col-lg-5 -->
        </div>
    </div>

</div>
