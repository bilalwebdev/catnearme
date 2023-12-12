<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('Add new parent') }}</h2>
            </div>
            {{ Breadcrumbs::render('add-parent') }}
        </div><!-- end breadcrumb-content -->
            <div class="block-card mb-4">
                <div class="block-card-body">
                    <div class="form-box">
                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <h5 class="mb-3">Photo preview</h5>
                                <input type="file" hidden id="photo" wire:model="photo">
                                <img src="{{ $photo?->temporaryUrl() ?? asset('images/no-image.jpg') }}" width="100" onclick="thisFileUpload()">
                                <p class="pt-2">Click to add a photo of the parent</p>
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
                                    <button class="theme-btn gradient-btn border-0" wire:click="add">Add Parent<i class="la la-arrow-right ml-2"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- end block-card-body -->
            </div>
    </div><!-- end dashboard-inner-body-container -->
    @push('scripts')
        <script>
            function thisFileUpload() {
                document.getElementById("photo").click();
            };
        </script>
    @endpush
</div>
