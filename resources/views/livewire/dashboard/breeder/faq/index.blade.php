<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('Faqs') }}</h2>
            </div>
            {{ Breadcrumbs::render('faqs') }}
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-header">
                        <h2 class="widget-title pb-0">{{ __('Faqs List') }}</h2>
                    </div>
                    <div class="block-card-body min-h-[90px]">


                        <div class="btn-box pt-1">
                            <button class="theme-btn gradient-btn border-0" wire:click="$toggle('is_create')">{{ __('Add New Question') }}</button>
                        </div>


                        <div class="mt-5">
                            @forelse($faqs as $faq)
                                <div class="d-flex mb-2">
                                    <h5>{{ $faq->name }}</h5>
                                    <div class="ml-1" wire:click="edit('{{ $faq->id }}')"><i class="la la-edit font-size-18 mr-1"></i></div>
                                    <div class="ml-1" wire:click="delete('{{ $faq->id }}')"><i class="la la-trash font-size-18 mr-1"></i></div>
                                </div>
                                <p>{{ $faq->text }}</p>
                                <hr>
                            @empty
                                <p>{{ __('You don\'t have any questions created right now, you can create them and they will appear in the listing.') }}</p>
                            @endforelse
                        </div>

                        @if($is_create || $is_edit)
                            <form wire:submit.prevent="save" class="form-box row pt-4 MultiFile-intercepted">
                                <div class="col-lg-12">
                                    <x-home.ui.input-box title="{{ __('Name') }}" wire:model.defer="faq.name" />
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12">
                                    <x-home.ui.textarea title="{{ __('Context') }}" wire:model.defer="faq.text"/>
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-12">
                                    <button class="theme-btn gradient-btn border-0">{{ __('Save') }}<i class="la la-arrow-right ml-2"></i></button>
                                </div>

                            </form>
                        @endif

                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div>
