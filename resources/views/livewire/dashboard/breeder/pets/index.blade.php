<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('My listings') }}</h2>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('pets.add') }}" class="theme-btn gradient-btn border-0 mr-5">Add Listing</a>
                {{ Breadcrumbs::render('my-listing') }}
            </div>
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-header">
                        <h2 class="widget-title pb-0">{{ __('Pets') }}</h2>
                    </div>
                    <div class="block-card-body">

                        @if($pets->isEmpty())
                            <div class="height-500 d-flex align-items-center justify-content-center flex-column">
                                <div class="text-center">
                                    <div class="mb-5">
                                        <img src="{{ asset('images/info.png') }}" alt="" width="120">
                                    </div>
                                    <h1 class="mb-2">{{ __('You don\'t have a listing right now') }}</h1>
                                    <p>{{ __('Start adding your listing and it will appear here') }}</p>
                                    <div class="btn-box pt-5">
                                        <a href="{{ route('pets.add') }}" class="theme-btn gradient-btn border-0">Add pet listing<i class="la la-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach($pets as $pet)
                                <div class="card-item card-item-list card-item--list">
                                    <div class="card-image">
                                        <a href="{{ route('listings.show', $pet) }}" class="d-block">
                                            <img src="{{ $pet->getFirstMediaUrl('photo' , 'thumb') }}"
                                                 data-src="{{ $pet->getFirstMediaUrl('photo' , 'thumb') }}"
                                                 class="card__img lazy" alt="">
                                            <span class="badge">{{ $pet->breed->title }}</span>
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <h1 class="card-title"><a
                                                href="{{ route('listings.show', $pet) }}">{{ $pet->title }}</a></h1>
                                        <div class="mt-8">
                                            <div class="d-flex flex-column line-height-35">
                                                <span>{{ __('Age') }}: {{ $pet->age }}</span>
                                                <span>{{ __('Gender') }}: {{ $pet->gender }}</span>
                                                <span>{{ __('Color') }}: {{ $pet->color }}</span>
                                            </div>
                                            <hr>
                                            <div class="inline-flex">
                                                <h4 class="mb-3">{{ __('Price') }}: ${{ $pet->price }}</h4>
                                            </div>

                                            <p class="pt-3">
                                                <span class="badge badge-dark p-2">{{ $pet->created_at->isoFormat('LLL') }}</span>
                                                @if($pet->status == 'active')
                                                    <span class="badge badge-success p-2">{{ __('Active') }}</span>
                                                @else
                                                    <span class="badge badge-danger p-2">{{ __('Not Active') }}</span>
                                                @endif
                                                <span class="badge badge-primary p-2">{{ __('Expires At') }}: {{ $pet->expired_at->isoFormat('LLL') }}</span>
                                            </p>
                                        </div>

                                        <div class="action-buttons position-absolute top-0 right-0 mt-3 mr-3">
                                            <a href="{{ route('dashboard.link.pet', $pet) }}"
                                               class="btn bg-rgb-secondary font-weight-medium mr-2"><i
                                                    class="la la-edit mr-1"></i>{{ __('Add Parent') }}</a>
                                            <a href="{{ route('pets.edit', $pet) }}"
                                               class="btn bg-rgb-success font-weight-medium mr-2"><i
                                                    class="la la-edit mr-1"></i>{{ __('Edit') }}</a>
                                            <a href="javascript:void(0)"
                                               onclick="confirm('Are you sure?');" class="btn bg-rgb-danger font-weight-medium"
                                               wire:click="delete('{{ $pet->slug }}')"><i
                                                    class="la la-trash mr-1"></i>{{ __('Delete') }}</a>

                                            @if($pet->status == 'not_active' && $pet->renew < 3)
                                                <a href="javascript:void(0)" class="btn bg-warning font-weight-medium"
                                                   wire:click="renew('{{ $pet->slug }}')"><i
                                                        class="la la-redo-alt mr-1"></i>{{ __('Renew') }}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div><!-- end card-item -->
                            @endforeach
                        @endif
                    </div><!-- end block-card-body -->

                    <div class="col-lg-12 pb-4">
                        <div class="text-center">
                            {{ $pets->links() }}
                        </div>
                    </div><!-- end col-lg-12 -->

                </div><!-- end block-card -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->
</div>
