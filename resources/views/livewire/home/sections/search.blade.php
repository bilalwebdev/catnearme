<!-- ================================
        START HERO AREA
    ================================= -->

<section class="hero-search-area arrow-down-shape bg-gradient-gray padding-top-50px padding-bottom-45px">
    <div class="container">
        <div class="row gap-8">
            <div class="col-lg-12">
                <div class="main-search-input mt-0 items-center gap-2">

                    <div class="main-search-input-item">
                        <div class="form-box">
                            <x-home.ui.input
                                title="Search keywords"
                                icon="la la-search"
                                wire:model.defer="search.keywords"
                            />
                        </div>
                    </div><!-- end main-search-input-item -->

                    <x-home.ui.country
                        :options="$countries"
                        field="country"
                        track_by="id"
                        wire:model.defer="search"
                    />

                    <x-home.ui.chosen_select
                        :options="$breeds"
                        field="breed"
                        track_by="id"
                        track_display="title"
                        wire:model="search"
                    />

                    <div class="main-search-input-item">
                        <button class="theme-btn gradient-btn border-0 w-100" type="submit" wire:click="search"><i class="la la-search mr-2"></i>{{ __('Search') }}</button>
                    </div><!-- end main-search-input-item -->
                </div><!-- end main-search-input -->
                <ul class="tag-list tag-list-sm text-center pt-4">
                    <li><span class="text-color font-weight-medium mr-1">Top Popular Searches:</span></li>

                    @foreach($popularSearches as $popular)
                        <li><a href="{{ route('listings.withbreed' ,$popular->slug) }}">{{ $popular->title }}</a></li>
                    @endforeach
                </ul>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hero-search-area -->
<!-- ================================
    START HERO AREA
================================= -->
