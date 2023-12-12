<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">Verification documents</h2>
            </div>
            <ul class="list-items bread-list bread-list-2">
                <li><a href="index.html">Home</a></li>
                <li>Verification</li>
            </ul>
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-body">
                        @if(! auth()->user()->document)
                            <div class="d-flex">
                                <div class="mr-4">
                                    <h3 class="mb-3">Utility Bill</h3>
                                    <img src="{{ Vite::asset('resources/images/img15.jpg') }}" alt="">
                                    <p>"Cat Association" you are a part of </p>
                                </div>
                                <div>
                                    <h3 class="mb-3">Cat Association</h3>
                                    <img src="{{ Vite::asset('resources/images/img15.jpg') }}" alt="">
                                </div>
                            </div>
                        @endif
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div>
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->
</div>
