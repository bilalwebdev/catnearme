<div>
    <div>
        <div class="container-fluid dashboard-inner-body-container">
            <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
                <div class="section-heading">
                    <h2 class="sec__title font-size-24 mb-0">{{ __('Edit parent') }}</h2>
                </div>
                {{ Breadcrumbs::render('edit-parent', $family) }}
            </div><!-- end breadcrumb-content -->
            <div class="block-card mb-4">
                <div class="block-card-body">
                    <div class="form-box">
                        <div class="row">


                            <div class="col-md-12 mb-3">
                                <h5 class="mb-3">Photo preview</h5>
                                <input type="file" hidden id="file" wire:model="photo">
                                <img src="{{ $family->getFirstMediaUrl('photo' , 'thumb') }}" width="100" onclick="thisFileUpload()">
                            </div>

                            <div class="col-md-12 mb-3">
                                <h5 class="mb-3">Parent photos</h5>
                                <input type="file" hidden id="photos" wire:model="photos" multiple>

                                @if($family->getMedia('photos')->isEmpty())
                                    <p class="mt-2 mb-2">{{ __('There are no pictures of the parent, please add') }}</p>
                                @else
                                    @foreach($family->getMedia('photos') as $imageGallery)
                                        <img src="{{ $imageGallery->getUrl('gallery') }}" width="150" class="mr-3">
                                    @endforeach
                                @endif

                                <div class="d-flex flex-column mt-3">
                                    <span>* {{ __('When new images are uploaded, the old gallery will be replaced by the new one') }}</span>
                                    <a class="mt-2" href="javascript:void(0)" onclick="photosUpload()">Upload photos</a>

                                    @if($family->hasMedia('photos'))
                                        <a class="mt-2 text-danger" href="javascript:void(0)" wire:click="clearPhotos">Clear photos</a>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <x-home.ui.input-box-default title="Name" placeholder="Enter Name" wire:model.defer="family.name" />
                            </div>

                            <div class="col-lg-3">
                                <x-home.ui.chosen_select
                                    title="Breed"
                                    :options="$breeds"
                                    :value="$family['breed_id']"
                                    field="breed_id"
                                    wire:model.defer="family"
                                />
                            </div>

                            <div class="col-lg-3">
                                <x-home.ui.input-box-default  title="Sire" placeholder="Enter sire" wire:model.defer="family.sire"  />
                            </div>


                            <div class="col-lg-3">
                                <x-home.ui.chosen_select
                                    title="Color"
                                    :options="$colors"
                                    :value="$family['color']"
                                    track_by="name"
                                    track_display="name"
                                    field="color"
                                    wire:model.defer="family"
                                />
                            </div>

                            <div class="col-lg-3">
                                <x-home.ui.chosen_select
                                    title="Type"
                                    :options="$roles"
                                    :value="$family['type']"
                                    track_by="name"
                                    track_display="title"
                                    field="type"
                                    wire:model.defer="family"
                                />
                            </div>

                            <div class="col-lg-3">
                                <x-home.ui.chosen_select
                                    title="Who"
                                    :options="$whoes"
                                    :value="$family['who']"
                                    track_by="name"
                                    track_display="title"
                                    field="who"
                                    wire:model.defer="family"
                                />
                            </div>

                            <div class="col-lg-3">
                                <x-home.ui.input-box-default  title="Age" placeholder="Enter age" wire:model.defer="family.age"  />
                            </div>

                            <div class="col-lg-3">
                                <x-home.ui.input-box-default  title="Size" placeholder="Enter size" wire:model.defer="family.size"  />
                            </div>

                            <div class="col-lg-12">
                                <x-home.ui.input-box-default  title="Awards" placeholder="Enter awards" wire:model.defer="family.awards"  />
                            </div>

                            <div class="col-lg-12">
                                <x-home.ui.textarea  title="Description" placeholder="Enter description" wire:model.defer="family.description"  />
                            </div>

                            <div class="col-lg-12">
                                <x-home.ui.textarea  title="Health" placeholder="Enter health" wire:model.defer="family.health"  />
                            </div>

                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <button class="theme-btn gradient-btn border-0" wire:click="edit">Edit Parent<i class="la la-arrow-right ml-2"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- end block-card-body -->
            </div>
        </div><!-- end dashboard-inner-body-container -->
    </div>
    @push('scripts')
        <script>
            function thisFileUpload() {
                document.getElementById("file").click();
            };

            function photosUpload() {
                document.getElementById("photos").click();
            };
        </script>
    @endpush
</div>
