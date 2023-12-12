<div class="col-lg-3">
    <div class="sidebar mt-0">
        <div class="sidebar-widget">
            <h3 class="widget-title">{{ __('Search') }}</h3>
            <div class="stroke-shape mb-4"></div>
            <form action="#" class="form-box" wire:ignore>

                <x-home.ui.input-box-default
                    title="{{ __('Keywords') }}"
                    placeholder="Search keywords"
                    wire:model.defer="keywords"
                />

                <x-home.ui.chosen_select
                    selectTitle="{{ __('Select Of Breed') }}"
                    :options="$breeds"
                    :value="$breed"
                    wire:model.defer="breed"
                />

                <x-home.ui.chosen_select
                    selectTitle="{{ __('Select Of Color') }}"
                    :options="$colors"
                    track_by="name"
                    track_display="name"
                    :value="$color"
                    wire:model.defer="color"
                />

                <x-home.ui.country
                    :options="$countries"
                    track_display="name"
                    :value="$country"
                    wire:model.defer="country"
                />

                <x-home.ui.input-box-default
                    title="{{ __('Breeder') }}"
                    placeholder="Search by breeder name"
                    wire:model.defer="breeder"
                />

            </form>

        </div><!-- end sidebar-widget -->


        <div class="sidebar-widget">
            <div class="btn-box">
                <button type="submit" class="theme-btn gradient-btn w-100 border-0" wire:click="applyFilter()">
                    {{ __('Apply Filter') }} <i class="la la-arrow-right ml-1"></i>
                </button>
                <button type="submit" class="btn-gray btn-gray-lg mt-3 w-100" wire:click="resetFilters">
                    <i class="la la-redo-alt mr-1"></i> {{ __('Reset Filters') }}
                </button>
            </div>
        </div><!-- end sidebar-widget -->
        @if(!$left_sidebars->isEmpty())
            <div class="sidebar-widget">
                <h3 class="widget-title">{{ __('Advertising') }}</h3>
                @foreach($left_sidebars as $lftSide)
                    <a href="{{ $lftSide->url }}">
                        <img src="{{ $lftSide->getFirstMediaUrl('photo' , 'thumb') }}" class="w-100">
                    </a>
                    {!! $lftSide->iframe !!}
                @endforeach
            </div><!-- end sidebar-widget -->
        @else
            <div class="sidebar-widget">
                <h3 class="widget-title">{{ __('Advertising') }}</h3>
                <p class="text-color-3 mb-3">{{ __('Advertising space for affiliate advertising') }}</p>
                <hr>
                <img src="{{ asset('images/offer.png') }}" class="w-100">
            </div><!-- end sidebar-widget -->
        @endif
    </div><!-- end sidebar -->
</div><!-- end col-lg-4 -->
<div class="col-lg-6">
    <div class="row">
        @foreach($listings as $listing)
            <div class="col-md-6 responsive-column">
                <div class="card-item">
                    <div class="card-image">
                        <a href="{{ route('listings.showslug',[$listing->breed->slug,$listing->slug]) }}" class="d-block">
                            <img src="{{ $listing->getFirstMediaUrl('photo' , 'thumb') }}" data-src="{{ $listing->getFirstMediaUrl('photo' , 'thumb') }}" class="card__img lazy" alt="" width="270" height="270">
                        </a>
                        @if($listing->user->is_verify)
                            <div class="bookmark-btn" data-toggle="tooltip" data-placement="top" title="{{ __('Breeder Verified') }}">
                                <img src="{{ Vite::asset('resources/images/home/shield-transparent.png') }}" width="60">
                            </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <a href="{{ route('user.breeder.profile', $listing->user) }}" class="user-thumb d-inline-block" data-toggle="tooltip" data-placement="top" title="{{ $listing->user->username }}">
                            <img src="{{ $listing->user->getFirstMediaUrl('avatar', 'thumb') }}" alt="{{ $listing->user->username }}">
                        </a>
                        <h4 class="card-title pt-3">
                            <a href="{{ route('listings.showslug', [$listing->breed->slug,$listing->slug]) }}">{{ $listing->title }}</a>
                        </h4>
                        <p class="card-sub mb-2">
                            <a href="{{ route('listings' , ['country' => $listing->user->country]) }}">
                                <i class="la la-map-marker mr-1 text-color-2"></i>
                                {{ $listing->user->country->name }}
                            </a>
                        </p>

                        <div>
                            <span class="badge badge-warning font-size-15 mb-2">{{ $listing->user->averageRating(1) ?? 0.0 }}</span>
                            <span class="ml-1">{{ __('ratings') }}</span>
                        </div>

                        @can('client')
                            <a href="javascript:void(0)" wire:click="addFavorite('{{ $listing->id }}')" class="mt-3">{{ __('Add to favorites') }}</a>
                        @endcan
                        <hr>
                        <div>
                            <ul class="mb-3 line-height-35">
                                <li>{{ __('Breed') }}: <span class="badge badge-info p-1">{{ $listing->breed->title }}</span>
                                </li>
                                <li>{{ __('Color') }}: {{ $listing->color }}</li>
                                <li>{{ __('Gender') }}: {{ $listing->gender }}</li>
                                <li>{{ __('Age') }}: {{ $listing->age }}</li>
                            </ul>
                            <h3 class="mb-1">{{ __('Price') }}: ${{ $listing->price }}</h3>
                            <span>{{ __('Price of breeding') }}: <b>${{ $listing->price_breeding }}</b></span>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-6 -->
        @endforeach
    </div><!-- end row -->
    <div class="row">
        <div class="col-lg-12 pt-3 text-center">
            {{ $listings->links() }}
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</div><!-- end col-lg-8 -->
<div class="col-lg-3">
    <div class="sidebar mt-0">
        @if(!$right_sidebars->isEmpty())
            <div class="sidebar-widget">
                <h3 class="widget-title">{{ __('Advertising') }}</h3>
                @foreach($right_sidebars as $rghtSide)
                    <a href="{{ $rghtSide->url }}">
                        <img src="{{ $rghtSide->getFirstMediaUrl('photo' , 'thumb') }}" class="w-100">
                    </a>
                    {!! $rghtSide->iframe !!}
                @endforeach
            </div><!-- end sidebar-widget -->
        @else
            <div class="sidebar-widget">
                <h3 class="widget-title">{{ __('Advertising') }}</h3>
                <p class="text-color-3 mb-3">{{ __('Advertising space for affiliate advertising') }}</p>
                <hr>
                <img src="{{ asset('images/offer.png') }}" class="w-100">
            </div><!-- end sidebar-widget -->
        @endif

    </div><!-- end sidebar -->
</div><!-- end col-lg-4 -->
