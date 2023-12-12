<!-- ================================
           START BLOG AREA
    ================================= -->
<section class="blog-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <p class="sec__desc pb-2">{{ __('From Our Blog') }}</p>
                    <h2 class="sec__title mb-0">{{ __('What\'s on Our Mind') }}</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-60px">
            @forelse($blogs as $blog)
                <div class="col-lg-4 responsive-column">
                    <div class="card-item card-item-layout-2">
                        <div class="card-image">
                            <a href="{{ route('blog.detail', $blog) }}" class="d-block">
                                <img src="{{ $blog->getFirstMediaUrl('image' , 'thumb') }}" data-src="{{ $blog->getFirstMediaUrl('image' , 'thumb') }}" class="card__img lazy" alt="{{ $blog->title }}">
                                <span class="badge">{{ $blog->created_at->isoFormat('MMMM D YYYY') }}</span>
                            </a>
                        </div><!-- end card-image -->
                        <div class="card-content">
                            <x-home.feature.tags :href="route('blog')" :tags="$blog->tags" />

                            <h4 class="card-title pt-2 font-size-22">
                                <a href="{{ route('blog.detail', $blog) }}">{{ $blog->title }}</a>
                            </h4>
                            <p class="card-sub mt-3">
                                {{ Str($blog->description)->limit(30 , '...') }}
                            </p>
                            <ul class="listing-action d-flex justify-content-around align-items-center border-top border-top-color mt-4 pt-4">
                                <li class="pill"><i class="la la-eye mr-1"></i>{{ $blog->views }}</li>
                                <li class="pill"><i class="la la-comment mr-1"></i>{{ $blog->comments->count() }}</li>
                            </ul>
                        </div><!-- end card-content -->
                    </div><!-- end card-item -->
                </div><!-- end col-lg-4 -->
            @empty
                <div class="mx-auto">
                    <h3 class="pb-24 text-color-9 mb-5">{{ __('No posts have been created so far') }}</h3>
                </div>
            @endforelse
        </div><!-- end row -->
        <div class="more-btn-box pt-3 text-center">
            <a href="{{ route('blog') }}" class="theme-btn gradient-btn"><i class="la la-list-alt mr-2"></i>{{ __('Browse All Posts') }}</a>
        </div>
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->
