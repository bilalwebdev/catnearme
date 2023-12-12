<div>
    <livewire:home.headers.black />

    <section class="breadcrumb-area bread-overlay overflow-hidden"  style="background-image: url('{{ Vite::asset('resources/images/banners/about_us.png') }}'); background-position: 25% 40%">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">{{ $seo->heading }}</h2>
                        </div>

                        {{ Breadcrumbs::view('partials/breadcrumbs-list' , 'about-us') }}

                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="bread-svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="50px" viewBox="0 0 1200 150"
                 preserveAspectRatio="none">
                <g>
                    <path fill-opacity="0.2"
                          d="M0,150 C600,100 1000,50 1200,-1.13686838e-13 C1200,6.8027294 1200,56.8027294 1200,150 L0,150 Z"></path>
                </g>
                <g class="pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="300">
                    <path fill="rgba(255,255,255,0.8)"
                          d="M0,150 C600,120 1000,80 1200,30 C1200,36.8027294 1200,76.8027294 1200,150 L0,150 Z"></path>
                </g>
                <path fill="#fff"
                      d="M0,150 C600,136.666667 1000,106.666667 1200,60 C1200,74 1200,104 1200,150 L0,150 Z"></path>
                <defs></defs>
            </svg>
        </div><!-- end bread-svg -->
    </section>
    <section class="about-area padding-top-100px">
        <div class="container">
            <div class="row padding-bottom-100px align-items-center">
                <div class="col-lg-6">
                    <div class="about-content mt-0">
                        <div class="section-heading">
                            <div class="section-badge pb-3">
                                <span class="ribbon ribbon-2 bg-2 text-white">Who we are?</span>
                            </div>
                            <h2 class="sec__title">Problem Statement</h2>
                            <p class="sec__desc pb-3">
                                The prevalent exclusion of animal listings for sale on most social platforms presents a pressing challenge for animal enthusiasts, breeders, and potential pet owners seeking a safe and regulated environment to connect and engage in responsible pet transactions. This restriction stifles the accessibility and visibility of reputable breeders, ethical sellers, and rescue organizations, limiting their ability to showcase healthy and well-cared-for animals to a broad audience of interested individuals.
                            </p>
                        </div><!-- end section-heading -->
                    </div>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="img-boxes row">
                        <div class="img-box-item mb-4 js-tilt-2" style="will-change: transform; transform: perspective(300px) rotateX(0deg) rotateY(0deg);">
                            <img class="lazy" src="{{ Vite::asset('resources/images/about/1.png') }}" alt="about-img" style="">
                        </div>
                    </div><!-- end img-boxes -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
            <div class="section-block"></div>
            <div class="row section-padding">
                <div class="col-lg-3">
                    <div class="img-boxes">
                        <div class="img-box-item">
                            <img class="lazy" src="{{ Vite::asset('resources/images/about/4.png') }}" alt="about-img">
                        </div>
                    </div><!-- end img-boxes -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="about-content pl-4 mb-0">
                        <div class="section-heading">
                            <h2 class="sec__title">Our Story</h2>
                            <p class="sec__desc pb-3">
                                In a world where whiskers meet wonders and purrs harmonize with hearts, "CatNearme" was born from a shared passion for cats and a desire to create a purrfect connection between extraordinary felines and their destined human companions. Our founders, lifelong cat enthusiasts, envisioned a magical online marketplace where the unique bond between cat breeders and future cat parents could be nurtured, celebrated, and cherished.
                            </p>
                        </div><!-- end section-heading -->
                    </div>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
            <div class="section-block"></div>
            <div class="row margin-bottom-90px">
                <div class="col-lg-10 mx-auto">
                    <div class="about-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title">Our Mission Is Simple: Make Finding Furball Easier</h2>
                            <p class="sec__desc">
                                At "CatNearme," our mission is simple yet profound - to bring joy, love, and happiness into the lives of both feline furballs and adoring human souls. We believe that every cat deserves a loving forever home, and every future cat parent deserves to find their ideal feline friend - a match made in whisker-heaven.
                            </p>
                        </div><!-- end section-heading -->
                    </div>
                </div><!-- end col-lg-10 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
</div>
