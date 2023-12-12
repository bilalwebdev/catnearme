<div>

    @push('styles')
        <style>
            #map { position: inherit; top:0; bottom:0; right:0; left:0; }
        </style>
    @endpush
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('My Profile') }}</h2>
            </div>
            {{ Breadcrumbs::render('my-profile') }}
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-lg-9">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-header">
                        <h2 class="widget-title pb-0">{{ __('Profile Details') }}</h2>
                    </div>

                    <div class="block-card-body">
                        <div class="edit-profile-photo d-flex align-items-center flex-column">
                            <img src="{{ auth()->user()->getFirstMediaUrl('avatar' , 'thumb') }}" alt="" class="profile-img">

                            <div class="file-upload-wrap file-upload-wrap-2 mt-4">
                                <div class="MultiFile-wrap" id="MultiFile1">
                                    <input type="file" wire:model="avatar" name="files[]" class="multi file-upload-input with-preview MultiFile-applied"  maxlength="1" id="MultiFile1" value=""><div class="MultiFile-list" id="MultiFile1_list"></div>
                                </div>
                                <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload Photo</span>
                                <p>Maximum file size: 10 MB.</p>
                            </div>
                        </div><!-- end edit-profile-photo -->
                        <div class="form-box row pt-4">


                            <div class="col-lg-12 mb-3">
                                <div class="mb-4">
                                    <h3 class="mb-2">Click on the map to update your address.</h3>
                                    <p>In order to update the address, you need to click on the magnifying glass and enter the address, after entering the address, select the object and click on it, the address will be updated in the field, then don't forget to click Update to apply the information</p>
                                </div>
                                <div id="map" style="height: 300px;" wire:ignore></div>
                            </div>

                            <div class="col-lg-12">
                                <x-home.ui.textarea title="About Me" icon="la la-user" placeholder="Enter about me" wire:model.defer="user.about_me" class="mb-5" />
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-3">
                                <x-home.ui.input-box title="Your Name" icon="la la-user" placeholder="Enter your name" wire:model.defer="user.first_name" />
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-3">
                                <x-home.ui.input-box title="Your Name" icon="la la-user" placeholder="Enter your name" wire:model.defer="user.last_name" />
                            </div><!-- end col-lg-12 -->


                            <div class="col-lg-3">
                                <x-home.ui.input-box title="Username" icon="la la-user" placeholder="Enter username"  wire:model.defer="user.username"/>
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-3">
                                <x-home.ui.input-box title="Your Email" icon="la la-envelope-o" placeholder="Enter email" wire:model.defer="user.email" />
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-6">
                                <x-home.ui.input-box title="Phone Number" icon="la la-phone" placeholder="+7(123)987654" wire:model.defer="user.phone_number" />
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-6">
                                <x-home.ui.input-box title="Address" icon="la la-map-marker" placeholder="+United states, state" wire:model.defer="user.address" />
                            </div><!-- end col-lg-12 -->

                            <div class="col-lg-12">
                                <div class="btn-box pt-1">
                                    <button class="theme-btn gradient-btn border-0" wire:click="save">{{ __('Save Changes') }}<i class="la la-arrow-right ml-2"></i></button>
                                </div>
                            </div><!-- end col-lg-12 -->
                        </div>
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-3">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-header">
                        <h2 class="widget-title pb-0">{{ __('Change Password') }}</h2>
                    </div>
                    <div class="block-card-body">
                        <form wire:submit.prevent="changePassword" class="form-box row">
                            <div class="col-lg-12">
                                <x-home.ui.input-box-password title="Current Password"  placeholder="*****" wire:model.defer="password.current_password" />
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <x-home.ui.input-box-password title="New Password"  placeholder="*****" wire:model.defer="password.new_password"/>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <x-home.ui.input-box-password title="Confirm New Password"  placeholder="*****" wire:model.defer="password.password_confirmation" />
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <div class="btn-box pt-1">
                                    <button class="theme-btn gradient-btn border-0">{{ __('Change Password') }}<i class="la la-arrow-right ml-2"></i></button>
                                </div>
                            </div><!-- end col-lg-12 -->
                        </form>
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
                @can('breeder')
                    <div class="block-card dashboard-card mb-4">
                        <div class="block-card-header d-flex justify-content-between">
                            <h2 class="widget-title pb-0">{{ __('Verification documents') }}</h2>
                        </div>
                        <div class="block-card-body">

                            @if(auth()->user()?->document?->status == 'submitted')
                                <p class="mb-4 text-secondary font-size-20">{{ __('The documents were sent for inspection') }}</p>
                            @elseif(auth()->user()?->document?->status == 'pending_verification')
                                <p class="mb-4 font-size-20">{{ __('Documents in the process of verification') }}</p>
                            @elseif(auth()->user()?->document?->status == 'verified')
                                <p class="mb-4 text-success font-size-20">{{ __('The uploaded documents have been verified') }}</p>
                            @elseif(auth()->user()?->document?->status == 'rejected')
                                <p class="mb-4 text-danger font-size-20">{{ __('Uploaded documents have not been verified') }}</p>
                            @elseif(auth()->user()?->document?->status == 'document_reupload')
                                <p class="mb-4 text-danger font-size-20">{{ __('Requires re-uploading of documents') }}</p>
                            @endif

                            @if(! auth()->user()->document || auth()->user()?->document?->status == 'document_reupload')

                                <p>{{ __('Upload 2 types of documents to utilize the full capabilities of the site') }}</p>.

                                <div class="mb-3">
                                    <div class="file-upload-wrap file-upload-wrap-2">
                                        <input type="file" name="files[]" class="multi file-upload-input with-preview w-100" wire:model.defer="documents.utility_bill">
                                        <span class="file-upload-text"><i class="la la-photo mr-2"></i>{{ __('Utility Bill') }}</span>
                                        <span class="font-size-11 mt-4">
                                            @if(isset($documents['utility_bill']))
                                                <b>{{ $documents['utility_bill']->getClientOriginalName() }}</b>
                                            @endif
                                        </span>
                                    </div><!-- file-upload-wrap -->
                                </div>

                                <div  class="mb-3">
                                    <div class="file-upload-wrap file-upload-wrap-2 w-100">
                                        <input type="file" name="files[]" class="multi file-upload-input with-preview w-100" wire:model.defer="documents.cat_association">
                                        <span class="file-upload-text"><i class="la la-photo mr-2"></i>{{ __('Cat association') }}</span>
                                        <span class="font-size-11 mt-4">
                                            @if(isset($documents['cat_association']))
                                                <b>{{ $documents['cat_association']->getClientOriginalName() }}</b>
                                            @endif
                                        </span>
                                    </div><!-- file-upload-wrap -->
                                </div>

                                <div class="btn-box pt-1">
                                    <button class="theme-btn gradient-btn border-0" wire:click="sendDocument">{{ __('Send Verification') }}<i class="la la-arrow-right ml-2"></i></button>
                                </div>
                            @endif
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                @endcan
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->

    @push('scripts')
        <script>

            window.addEventListener('DOMContentLoaded', () => {
                const apiKey = "A7qeQaFwKfSHQTwd0Eos";

                var map = L.map('map' , {
                    minZoom: 3
                }).setView([ {{ auth()->user()->lat }}, {{ auth()->user()->lng }} ], 4);


                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

                map.attributionControl.setPrefix(false)

                var searchControl = L.esri.Geocoding.geosearch().addTo(map);

                var results = L.layerGroup().addTo(map);

                results.addLayer(L.marker([ {{ auth()->user()->lat }}, {{ auth()->user()->lng }} ]));

                map.on('click' , (e) => {

                    L.esri.Geocoding
                        .reverseGeocode({
                            apikey: apiKey
                        })
                        .latlng(e.latlng)
                        .run(function (error, result) {
                            if (error) {
                                return;
                            }

                            results.clearLayers();
                            results.addLayer(L.marker(result.latlng).addTo(map).bindPopup(result.address.Match_addr).openPopup());
                            @this.set('user.lat' , e.latlng.lat)
                            @this.set('user.lng' , e.latlng.lng)
                            @this.set('user.address' , result.address.Match_addr)
                        });
                })

                searchControl.on('results', function (data) {

                    results.clearLayers();
                    for (var i = data.results.length - 1; i >= 0; i--) {

                        results.addLayer(L.marker(data.results[i].latlng));

                        @this.set('user.lat' , data.results[i].latlng.lat)
                        @this.set('user.lng' , data.results[i].latlng.lng)
                        @this.set('user.address' , data.results[i].text)
                    }
                });
            })
        </script>
     @endpush

</div><!-- end dashboard-inner-body -->
