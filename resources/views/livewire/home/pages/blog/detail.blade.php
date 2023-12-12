<div>

    <livewire:home.headers.black />

    <!-- ================================
       START BREADCRUMB AREA
   ================================= -->
    <section class="breadcrumb-area  bread-overlay overflow-hidden" style="background-image: url('{{ Vite::asset('resources/images/bg/blog.jpg') }}'); background-position: 25% 40%">>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">{{ __('Blog Details') }}</h2>
                        </div>
                        {{ Breadcrumbs::view('partials/breadcrumbs-list' , 'blog-detail', $blog) }}
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="bread-svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 1200 150" preserveAspectRatio="none">
                <g><path fill-opacity="0.2" d="M0,150 C600,100 1000,50 1200,-1.13686838e-13 C1200,6.8027294 1200,56.8027294 1200,150 L0,150 Z"></path></g><g class="pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="300"><path fill="rgba(255,255,255,0.8)" d="M0,150 C600,120 1000,80 1200,30 C1200,36.8027294 1200,76.8027294 1200,150 L0,150 Z"></path></g><path fill="#fff" d="M0,150 C600,136.666667 1000,106.666667 1200,60 C1200,74 1200,104 1200,150 L0,150 Z"></path><defs></defs>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
        END BREADCRUMB AREA
    ================================= -->

    <!-- ================================
           START BLOG AREA
    ================================= -->
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card-item single-card">
                        <div class="card-image after-none">
                            <div class="single-slider owl-trigger-action owl-trigger-action-3">
                                <div class="single-slider-item">
                                    <img src="{{ $blog->getFirstMediaUrl('image' , 'thumb') }}" class="card__img" alt="Post: {{ $blog->title }}">
                                </div>
                            </div>
                        </div><!-- end card-image -->
                        <div class="card-content">
                            <h4 class="card-title font-size-25 mb-0">{{ $blog->title }}</h4>
                            <div class="d-flex flex-wrap align-items-center pt-3">
                                <ul class="listing-meta d-flex align-items-center pt-0">
                                    <li class="mr-3">
                                        <i class="la la-calendar mr-1"></i>{{ $blog->created_at->isoFormat('llll') }}
                                    </li>
                                    <li class="mr-3">
                                        <i class="la la-tags mr-1"></i>

                                        @foreach($blog->tags as $tag)
                                            <a href="#" class="listing-cat-link">{{ $tag }}</a> {{ $loop->last ? '' : ',' }}
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                            <p class="card-sub mt-3">{!! $blog->content !!}</p>
                        </div><!-- end card-content -->
                    </div><!-- end card-item -->
                    <ul class="post-nav d-flex align-items-center justify-content-between margin-bottom-80px">
                        @if($previous)
                            <li class="prev-post">
                                <a href="{{ route('blog.detail', $previous) }}">
                                    <i class="la la-angle-left"></i>
                                    <span class="d-block font-size-12 line-height-20">{{ __('Previous Post') }}</span>
                                    <span class="text-truncate">{{ $previous->title }}</span>
                                </a>
                            </li>
                        @endif

                        @if($next)
                            <li class="next-post text-right">
                                <a href="{{ route('blog.detail', $next) }}">
                                    <i class="la la-angle-right"></i>
                                    <span class="d-block font-size-12 line-height-20">{{ __('Next Post') }}</span>
                                    <span class="text-truncate ml-auto">{{ $next->title }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                   <div class="row margin-bottom-50px">
                        <div class="col-lg-12">
                            <h3 class="widget-title font-size-24 pb-4">{{ __('Related Posts') }}</h3>
                        </div><!-- end col-lg-12 -->

                       @foreach($relatedPosts as $related)
                           <div class="col-lg-6 responsive-column">
                               <div class="card-item card-item-layout-2">
                                   <div class="card-image">
                                       <a href="{{ route('blog.detail', $related) }}" class="d-block">
                                           <img src="{{ $related->getFirstMediaUrl('image' , 'thumb') }}" data-src="{{ $related->getFirstMediaUrl('image' , 'thumb') }}" class="card__img lazy" alt="Post: {{ $related->title }}">
                                           <span class="badge">{{ $related->created_at->isoFormat('LLL') }}</span>
                                       </a>
                                   </div><!-- end card-image -->
                                   <div class="card-content">
                                       <x-home.feature.tags :href="route('blog')" :tags="$related->tags" />
                                       <h4 class="card-title pt-2">
                                           <a href="{{ route('blog.detail', $related) }}">{{ $related->title }}</a>
                                       </h4>
                                       <p class="card-sub mt-3">
                                           {{ str($related->description)->limit(30 , '....') }}
                                       </p>
                                       <ul class="listing-action d-flex justify-content-around align-items-center border-top border-top-color mt-4 pt-4">
                                           <li class="pill"><i class="la la-eye mr-1"></i>{{ $related->views }}</li>
                                           <li class="pill"><i class="la la-comment mr-1"></i>{{ $related->comments->count() }}</li>
                                       </ul>
                                   </div><!-- end card-content -->
                               </div><!-- end card-item -->
                           </div><!-- end col-lg-6 -->
                       @endforeach
                    </div><!-- end row -->
                    <div class="block-card mb-4">
                        <div class="block-card-header">
                            <h2 class="widget-title pb-0">{{ __('Comments') }} <span class="ml-1 text-color-2">({{ $comments->count() }})</span></h2>
                        </div><!-- end block-card-header -->
                        <div class="block-card-body">
                            <div class="comments-list">
                                @forelse($comments as $comment)

                                    <div class="comment">
                                        <div class="user-thumb user-thumb-lg flex-shrink-0">
                                            <img src="{{ $comment->creator->getFirstMediaUrl('avatar' , 'thumb') }}">
                                        </div>
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <h4 class="comment__title">{{ $comment->creator->username }}</h4>
                                                <span class="comment__meta">{{ $comment->creator->country->name }}</span>
                                                <span class="comment__meta">{{ $comment->creator->created_at->isoFormat('LLL') }}</span>
                                            </div>
                                            <p class="comment-desc">
                                                {{ $comment->body }}
                                            </p>
                                        </div>
                                    </div><!-- end comment -->
                                @empty
                                    <p class="text-center text-color-1 font-size-22">{{ __('No comments at the moment, be the first to comment') }}</p>
                                @endforelse
                            </div>
                            @if($comments->hasPages())
                                <div class="text-center">
                                    {{ $comments->links() }}
                                </div><!-- end text-center-->
                            @endif
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                    <div class="block-card">
                        <div class="block-card-header">
                            <h2 class="widget-title pb-0">{{ __('Add a Comment') }}</h2>
                            <p>{{ __('You must be an authorized user to add a comment') }} *</p>
                        </div><!-- end block-card-header -->

                        @auth
                            <div class="block-card-body">

                                <form wire:submit.prevent="sendComment" class="form-box row">
                                    <div class="col-lg-12">
                                        <x-home.ui.textarea title="Message" placeholder="Write comment..." wire:model.defer="comment.message" />
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box pt-1">
                                            <button class="theme-btn gradient-btn border-0">{{ __('Add Comment') }}<i class="la la-arrow-right ml-2"></i></button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </form>
                            </div><!-- end block-card-body -->
                        @elseguest
                            <a href="#" data-toggle="modal" data-target="#loginModal" class="theme-btn gradient-btn shadow-none add-listing-btn-hide mt-4">
                                <i class="la la-arrow-right mr-2"></i> {{ __('Sign In') }}
                            </a>
                        @endauth
                    </div><!-- end block-card -->
                </div><!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar mb-0">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{ __('Categories') }}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <div class="category-list">

                                @foreach($categories as $category)
                                    <a href="#" class="generic-img-card d-block hover-y overflow-hidden mb-3">
                                        <img src="{{ $category->getFirstMediaUrl('photo' , 'sm') }}" data-src="{{ $category->getFirstMediaUrl('photo' , 'sm') }}" alt="Category: {{ $category->title }}" class="generic-img-card-img lazy" width="310" height="60">
                                        <div class="generic-img-card-content d-flex align-items-center justify-content-between">
                                            <span class="badge">{{ $category->title }}</span>
                                            <span class="generic-img-card-counter">{{ $category->blogs->count() }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">{{ __('Tags Cloud') }}</h3>
                            <div class="stroke-shape mb-4"></div>
                            <ul class="tag-list">
                                @foreach($blog->tags as $tag)
                                    <li><a href="#">{{ $tag }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end blog-area -->
    <!-- ================================
           START BLOG AREA
    ================================= -->
</div>
