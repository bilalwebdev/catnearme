<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('Parent link pet') }}</h2>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('dashboard.parents.add') }}" class="theme-btn gradient-btn border-0 mr-5">Add Parent</a>
                {{ Breadcrumbs::render('link-parents', $pet) }}
            </div>
        </div><!-- end breadcrumb-content -->

        <div class="row">
            <div class="col-lg-12">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-header">
                        <h2 class="widget-title pb-0">Your Reviews</h2>
                    </div>
                    <div class="block-card-body">

                    <div class="alert alert-info" role="alert">
                        <p>{{ __('To add a parent to the desired pet you need to select the parent and click Link parent this pet , thus you will link the pair') }}</p>
                    </div>

                    <div class="row">
                        @foreach($parents as $parent)
                            <div class="col-md-2">
                                <div class="card card-item p-3">

                                    <img src="{{ $parent->getFirstMediaUrl('photo' , 'thumb') }}" class="w-100">
                                    <hr>
                                    <div class="line-height-35">
                                        <p>{{ __('Name') }}: {{ $parent->name }}</p>
                                        <p>{{ __('Breed') }}: {{ $parent->breed->title }}</p>
                                    </div>

                                    <div class="d-flex flex-column">
                                        @if($pet->parents()->where('family_id' , $parent->id)->exists())
                                            <span class="badge badge-info p-2">{{ __('This parent is attached to this kitten') }}</span><a href="javascript:void(0)" class="text-danger" wire:click="removeParent('{{ $parent->id }}')">{{ __('Remove') }}</a>
                                        @else
                                            <div>
                                                <a href="javascript:void(0)" class="underline" wire:click="linkParent('{{ $parent->id }}')">{{ __('Link parent this pet') }}</a>
                                                <br>
                                                <span class="text-color-12">{{ __('This parent is not yet attached') }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div><!-- end col-lg-12 -->
        </div>
    </div><!-- end dashboard-inner-body-container -->
</div>
