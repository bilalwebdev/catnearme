<div>
    <livewire:home.headers.black/>
    <section class="breadcrumb-area bread-bg-2 bread-overlay overflow-hidden" style="background-image: url('{{ Vite::asset('resources/images/banners/pets_add.png') }}');  background-position: 25% 40%">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                        <div class="section-heading">
                            <h2 class="sec__title text-white font-size-40 mb-0">{{ __('Edit a family ' . $family->name) }}</h2>
                            <span class="badge badge-info p-2 font-size-22">{{ $family->type }}</span>
                        </div>
                        <ul class="list-items bread-list ">
                            <li><a href="index.html">Home</a></li>
                            <li>Edit pet {{ $family->name }}</li>
                        </ul>
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
                    <div>
                        <div class="block-card mb-4">
                            <div class="block-card-header">
                                <h2 class="widget-title">Information - {{ $family->name }}</h2>
                                <div class="stroke-shape"></div>
                            </div><!-- end block-card-header -->
                            <div class="block-card-body">
                                <div class="form-box row MultiFile-intercepted">

                                    <div class="col-md-12">
                                        <label class="label-text">Upload Pet's Photo</label>
                                        <div class="file-upload-wrap file-upload-wrap-2 mb-2">
                                            <input type="file" name="files[]" class="file-upload-input with-preview" wire:model.defer="photo">
                                            <span class="file-upload-text"><i class="la la-photo mr-2"></i>Choose</span>
                                        </div><!-- file-upload-wrap -->

                                        <img src="{{ $family->getFirstMediaUrl('photo' , 'thumb') }}" alt="" width="150">

                                        <hr>

                                        <label class="label-text">Upload Pet's Photos</label>
                                        <div class="file-upload-wrap file-upload-wrap-2 mb-2">
                                            <input type="file" name="files[]" class="file-upload-input with-preview" multiple wire:model.defer="photos">
                                            <span class="file-upload-text"><i class="la la-photo mr-2"></i>Choose</span>
                                        </div><!-- file-upload-wrap -->

                                        <div class="full-screen-slider owl-trigger-action owl-trigger-action-2" wire:ignore>
                                            @foreach($family->getMedia('photos') as $photos)
                                                <a href="{{ $photos->getUrl('thumb') }}" class="fs-slider-item d-block" data-fancybox="gallery" data-caption="Pet Breeder - {{ $family->name }}">
                                                    <img src="{{ $photos->getUrl('gallery') }}" alt="single listing image">
                                                </a><!-- end fs-slider-item -->
                                            @endforeach
                                        </div>

                                    </div>

                                    <div class="col-lg-12">
                                        <x-home.ui.input-box-default
                                            title="Name"
                                            placeholder="Enter as name"
                                            wire:model.defer="family.name"
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-3">

                                        <x-home.ui.chosen
                                            title="Breed"
                                            :options="$breed"
                                            track-by="id"
                                            select="title"
                                            wire:model="family.breeder_id"
                                        />
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-3">
                                        <x-home.ui.chosen
                                            title="Gender"
                                            value="male"
                                            :options="$gender"
                                            track-by="name"
                                            select="title"
                                            wire:model.defer="family.gender"
                                        />
                                    </div><!-- end col-lg-6 -->

                                    <div class="col-lg-3">
                                        <x-home.ui.chosen
                                            title="Role"
                                            value="mother"
                                            :options="$roles"
                                            track-by="name"
                                            select="title"
                                            wire:model.defer="family.type"
                                        />
                                    </div>

                                    <div class="col-lg-3">
                                        <x-home.ui.chosen
                                            title="Who"
                                            value="father"
                                            :options="$whoes"
                                            track-by="name"
                                            select="title"
                                            wire:model.defer="family.who"
                                        />
                                    </div>

                                    <div class="col-lg-12">
                                        <x-home.ui.textarea
                                            title="Health"
                                            wire:model.defer="family.health"
                                            rows="1"
                                            class="mb-2"
                                            placeholder="Enter health"
                                        />
                                    </div>

                                    <div class="col-lg-12 mb-4">
                                        <x-home.ui.textarea
                                            title="Achievements Certificates"
                                            wire:model.defer="family.achievements_certificates"
                                            rows="1"
                                            placeholder="Enter achievements certificates"
                                        />
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="button" wire:loading.attr="disabled" class="theme-btn gradient-btn border-0" wire:click="save">
                                            Update
                                        </button>
                                    </div>


                                </div>

                            </div><!-- end block-card-body -->
                        </div><!-- end block-card -->
                    </div>
                </div><!-- end col-lg-10 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
</div>
