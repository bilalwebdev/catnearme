<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('Parents') }}</h2>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('dashboard.parents.add') }}" class="theme-btn gradient-btn border-0 mr-5">Add Parent</a>
                {{ Breadcrumbs::render('parents') }}
            </div>

        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-md-12">
                <div class="block-card mb-4">
                    <div class="block-card-header">
                        <h2 class="widget-title">{{ __('Listing parents') }}</h2>
                        <div class="stroke-shape"></div>
                    </div>
                    <div class="block-card-body">

                        @if($parents->isEmpty())
                            <div class="height-500 d-flex align-items-center justify-content-center flex-column">
                                <div class="text-center">
                                    <div class="mb-5">
                                        <img src="{{ asset('images/info.png') }}" alt="" width="120">
                                    </div>
                                    <h1 class="mb-2">{{ __('Parents not found') }}</h1>
                                    <p>{{ __('Add parents and link children to ready-made listings') }}</p>
                                    <div class="btn-box pt-5">
                                        <a href="{{ route('dashboard.parents.add') }}" class="theme-btn gradient-btn border-0">{{ __('Add Parent') }}<i class="la la-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                @foreach($parents as $parent)
                                    <div class="col-lg-3">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ $parent->name }}</span>
                                                </div>
                                            </div>
                                            <div class="card-body line-height-35">

                                                <img src="{{ $parent->getFirstMediaUrl('photo' , 'thumb') }}" alt="" width="80">

                                                <p>{{ __('Breed') }}: {{ $parent->breed->title }}</p>
                                                <p>{{ __('Who') }}: {{ str($parent->who)->ucfirst() }}</p>
                                                <p>{{ __('Age') }}: {{ $parent->age }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('dashboard.parents.edit', $parent) }}">Edit</a>
                                                    <a class="text-danger" href="javascript:void(0)" wire:click="delete('{{ $parent->id }}')">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div><!-- end block-card-body -->
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->
</div>
