<div>
    <livewire:home.headers.black />

    <section class="breadcrumb-area bread-bg-2 bread-overlay overflow-hidden" style="background-image: url('{{ Vite::asset('resources/images/banners/pets_add.png') }}');  background-position: 25% 40%">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">{{ __('Edit post') }}</h2>
                        </div>
                        {{ Breadcrumbs::view('partials/breadcrumbs-list' , 'edit-post', $pet) }}
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
    <section class="add-listing-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    @guest
                        <div class="alert alert-info font-size-15 text-color" role="alert">
                            <span class="font-weight-semi-bold">If you have an account</span>
                            <a href="#" class="alert-link text-color-2" data-toggle="modal" data-target="#loginModal">log
                                in</a>
                            log in, or <a href="#" class="alert-link text-color-2" data-toggle="modal"
                                          data-target="#signUpModal">create</a> an account to add a pet
                        </div><!-- alert -->
                    @endguest

                    <div>
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">General Information</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="form-box row MultiFile-intercepted">
                                    <div class="col-lg-12">
                                        <x-home.ui.input-box-default
                                                title="Title"
                                                placeholder="Enter as title"
                                                wire:model.defer="pet.title"
                                        />
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.input-box-default
                                                title="Age"
                                                placeholder="Specify the age"
                                                wire:model.defer="pet.age"
                                        />
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.chosen title="Color" :options="$colors" select="name" trackBy="name" wire:model.defer="pet.color"/>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">

                                        <x-home.ui.chosen
                                                title="Breed"
                                                :options="$breed"
                                                track-by="id"
                                                select="title"
                                                wire:model="pet.breed_id"
                                        />
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.chosen
                                                title="Gender"
                                                value="male"
                                                :options="$gender"
                                                track-by="name"
                                                select="title"
                                                wire:model.defer="pet.gender"
                                        />
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.input-box-default
                                                title="Keywords or Tags"
                                                placeholder="Enter keywords or Tags"
                                                wire:model.defer="pet.keywords"
                                        />
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.input-box-default
                                                title="Personality Traits"
                                                placeholder="Enter personality Traits"
                                                wire:model.defer="pet.pt"
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.input-box-default
                                                title="Price as Pet"
                                                placeholder="Enter price as pet"
                                                wire:model.defer="pet.price"
                                        />
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.input-box-default
                                                title="Price for Breeding"
                                                placeholder="Enter price for breeding"
                                                wire:model.defer="pet.price_breeding"
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-12">

                                        <x-home.ui.custom-checkbox
                                                title="Champion Bloodlines?"
                                                wire:model.defer="pet.cb"
                                        />

                                        <x-home.ui.custom-checkbox
                                                title="Pedigree"
                                                wire:model.defer="pet.pedigree"
                                        />

                                        <x-home.ui.custom-checkbox
                                                title="Neutered/Spayed?"
                                                wire:model.defer="pet.ns"
                                        />

                                        <div class="mt-4">
                                            <x-home.ui.textarea
                                                    title="Description (max 2000 character)"
                                                    wire:model.defer="pet.description"
                                                    rows="3"
                                                    class="mt-2"
                                                    placeholder="Enter Description"
                                            />
                                        </div>
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-md-12">
                                        <hr>
                                        <label class="label-text">Add Background Photos</label>
                                        <div class="file-upload-wrap file-upload-wrap-2 mb-2">
                                            <input type="file"
                                                   name="files[]"
                                                   class="file-upload-input with-preview"
                                                   wire:model="photo">
                                            <span class="file-upload-text"><i class="la la-photo mr-2"></i>Choose</span>
                                        </div><!-- file-upload-wrap -->

                                        <img src="{{ $pet->getFirstMediaUrl('photo' , 'thumb') }}" alt="">

                                        <hr>

                                        <label class="label-text">Add Pet Photos</label>
                                        <div class="file-upload-wrap file-upload-wrap-2 mb-2">
                                            <input type="file"
                                                   name="files[]"
                                                   class="file-upload-input with-preview"
                                                   multiple wire:model="photos">
                                            <span class="file-upload-text"><i class="la la-photo mr-2"></i>Choose</span>
                                        </div><!-- file-upload-wrap -->

                                        <div class="d-flex gap-4 owl-trigger-action owl-trigger-action-2">
                                            @foreach($pet->getMedia('photos') as $imageGallery)
                                                <a href="{{ $imageGallery->getUrl('thumb') }}" class="fs-slider-item d-block mr-2" data-fancybox="gallery" data-caption="Pet Breeder - {{ $pet->title }}">
                                                    <img src="{{ $imageGallery->getUrl('gallery') }}" alt="single listing image" width="200">
                                                </a><!-- end fs-slider-item -->
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->

                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Shipping</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="form-box row">
                                    <div class="col-lg-6">
                                        <x-home.ui.custom-checkbox title="Shipping fee" wire:model="shipping.shipping_fee"/>
                                        @if(! empty($shipping['shipping_fee']))
                                            <x-home.ui.input-box-default placeholder="100" wire:model.defer="shipping.shipping_price" />
                                        @endif
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.custom-checkbox
                                                title="Varies by destination"
                                                wire:model="shipping.shipping_destination"
                                        />
                                    </div><!-- end col-lg-6 -->
                                </div>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Vaccinations</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="form-box row">

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="Feline Herpesvirus (FHV)"
                                                wire:model="vactinations.fnv"
                                                popup="Protects against the feline herpesvirus, a common respiratory infection in cats."
                                        />
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="Feline Calicivirus (FCV)"
                                                wire:model="vactinations.fcv"
                                                popup="Guards against feline calicivirus, another viral respiratory infection in cats."
                                        />
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="Feline Panleukopenia (FPV)"
                                                wire:model="vactinations.fpv"
                                                popup="Also known as the feline distemper vaccine, it protects against a highly contagious and potentially deadly viral infection."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="Rabies"
                                                wire:model="vactinations.rabies"
                                                popup="Required by law in many regions, the rabies vaccine protects against the rabies virus, which can affect cats and humans."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="Feline Leukemia Virus (FeLV)"
                                                wire:model="vactinations.felv"
                                                popup="Recommended for cats at risk of exposure to the feline leukemia virus, which can cause various health issues, including immune suppression and cancer."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="Chlamydia"
                                                wire:model="vactinations.chlamydia"
                                                popup="Offers protection against chlamydia, a bacterial infection that can lead to conjunctivitis and respiratory problems in cats."
                                        />
                                    </div><!-- end col-lg-6 -->

                                </div>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Certification and Documentation</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="form-box row">

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="The International Cat Association (TICA)"
                                                wire:model="certifications.tica"
                                                popup=" TICA is one of the largest and well-known cat registries worldwide. It recognizes and registers a wide range of cat breeds, holds cat shows, and promotes responsible cat breeding."
                                        />
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="Cat Fanciers' Association (CFA)"
                                                wire:model="certifications.cfa"
                                                popup="CFA is another major cat registry and breeder association. It is one of the oldest and most prestigious cat organizations in North America, recognizing and promoting purebred cats through cat shows, breed standards, and educational programs."
                                        />
                                    </div><!-- end col-lg-4 -->


                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="American Cat Fanciers Association (ACFA)"
                                                wire:model="certifications.acfa"
                                                popup="ACFA is an organization based in the United States that focuses on cat shows, breed recognition, and promoting responsible cat breeding practices. It recognizes and registers various cat breeds."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="The Governing Council of the Cat Fancy (GCCF)"
                                                wire:model="certifications.gccf"
                                                popup="GCCF is the primary cat registry and breeder association in the United Kingdom. It oversees the registration, breed standards, and shows for pedigree cats."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="Cat Control Council of New South Wales (CCC of NSW)"
                                                wire:model="certifications.ccc_nsw"
                                                popup="CCC of NSW is an Australian cat registry and breeder association that promotes responsible breeding, cat welfare, and organizes cat shows in the state of New South Wales."
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-6">
                                        <x-home.ui.question-checkbox
                                                title="The World Cat Federation (WCF)"
                                                wire:model="certifications.wcf"
                                                popup="Founded in 1988, the WCF is headquartered in Germany and has member organizations and clubs in multiple countries around the world."
                                        />
                                    </div><!-- end col-lg-6 -->

                                </div>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->

                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <div class="d-flex justify-content-between">
                                    <h2 class="widget-title">Family</h2>
                                    <a href="{{ route('dashboard.parents.add') }}" class="theme-btn download-btn mr-2 bg-1 text-white hover-scale-2 mb-2">
                                        Add Parent
                                    </a>
                                </div>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="form-box row">
                                    <div class="col-lg-12">
                                        <div class="row">

                                            <div class="col-lg-12 mb-3">
                                                <h3 class="mb-3">Parents</h3>
                                                <div class="stroke-shape mb-3"></div>

                                                <div class="full-screen-slider owl-trigger-action owl-trigger-action-2" wire:ignore>

                                                    @foreach($pet->parents as $parent)
                                                        <div class="d-flex flex-column">
                                                            <a href="{{ route('dashboard.parents.edit', $parent->family) }}" class="d-block mr-3">
                                                                <img src="{{ $parent->family->getFirstMediaUrl('photo' , 'thumb') }}" alt="parent - {{ $parent->family->name }}" width="250">
                                                            </a>
                                                            <div class="d-block line-height-35">
                                                                <p>{{ __('Name') }}: {{ $parent->family->name }}</p>
                                                                <p>{{ __('Breed') }}: {{ $parent->family->breed->title }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->

                        <div class="btn-box">
                            <button type="button" wire:loading.attr="disabled" class="theme-btn gradient-btn border-0" wire:click="save">
                                Edit post
                            </button>
                        </div>
                    </div>
                </div><!-- end col-lg-10 -->
            </div><!-- end row -->
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('/assets/home/js/jquery.MultiFile.min.js') }}"></script>
    @endpush
</div>
