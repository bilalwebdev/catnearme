<div>
    <livewire:home.headers.black />

    <section class="breadcrumb-area bread-overlay overflow-hidden"  style="background-image: url('{{ Vite::asset('resources/images/bg/blog.jpg') }}'); background-position: 25% 40%">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">{{ $seo->heading }}</h2>
                        </div>
                        {{ Breadcrumbs::view('partials/breadcrumbs-list' , 'blog') }}
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="bread-svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 1200 150"
                 preserveAspectRatio="none">
                <g>
                    <path fill-opacity="0.2" d="M0,150 C600,100 1000,50 1200,-1.13686838e-13 C1200,6.8027294 1200,56.8027294 1200,150 L0,150 Z"></path>
                </g>
                <g class="pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="300">
                    <path fill="rgba(255,255,255,0.8)" d="M0,150 C600,120 1000,80 1200,30 C1200,36.8027294 1200,76.8027294 1200,150 L0,150 Z"></path>
                </g>
                <path fill="#fff" d="M0,150 C600,136.666667 1000,106.666667 1200,60 C1200,74 1200,104 1200,150 L0,150 Z"></path>
                <defs></defs>
            </svg>
        </div><!-- end bread-svg -->
    </section>

    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-lg-4 responsive-column">
                        <div class="card-item card-item-layout-2">
                            <div class="card-image">
                                <a href="{{ route('blog.detail', $post) }}" class="d-block">
                                    <img src="{{ $post->getFirstMediaUrl('image' , 'thumb') }}" class="card__img lazy" alt="blog image" style="">
                                    <span class="badge">{{ $post->created_at->isoFormat('LLL') }}</span>
                                </a>
                            </div><!-- end card-image -->
                            <div class="card-content">

                                <x-home.feature.tags :href="route('blog')" :tags="$post->tags" />

                                <h4 class="card-title pt-2">
                                    <a href="{{ route('blog.detail', $post) }}">{{ $post->title }}</a>
                                </h4>
                                <p class="card-sub mt-3">
                                    {{ str($post->description)->limit(30 , '...') }}
                                </p>
                                <ul class="listing-action d-flex justify-content-around align-items-center border-top border-top-color mt-4 pt-4">
                                    <li class="pill"><i class="la la-eye mr-1"></i>{{ $post->views }}</li>
                                    <li class="pill"><i class="la la-comment mr-1"></i>{{ $post->comments->count() }}</li>
                                </ul>
                            </div><!-- end card-content -->
                        </div><!-- end card-item -->
                    </div><!-- end col-lg-4 -->
                    @empty
                    <div class="col-lg-12 responsive-column">
                        <div class="bg-gray p-4 radius-round margin-bottom-80px">
                            <div class="hosted-by d-flex">
                                <div>
                                    <h4 class="font-size-20">{{ __('No Posts') }}</h4>
                                    <p class="pt-2 pb-3">{{ __('Animal news is not available right now, but will be here ') }}</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col-lg-4 -->
                @endforelse
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
</div>
