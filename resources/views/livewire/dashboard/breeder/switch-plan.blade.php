<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h1 class="sec__title font-size-24 mb-0"> {{ __('Your current tariff plan') }} - {{ auth()->user()->plan->title }}</h1>

                <span>{{ __('You can easily change your rate plan whenever you need it, you can also activate a discount coupon if you have one.') }}</span>

                @can('is_plan')
                    <div class="form-box mt-1">
                        <a href="javascript:void(0)" onclick="confirm('Are you sure you want to cancel your subscription now? You will no longer be verified, and you will need to restart the identification process on renewal') || event.stopImmediatePropagation()"  wire:click="cancel" class="text-danger">{{ __('Cancel Subscription') }}</a>
                    </div>
                @endcan

                <div class="form-box mt-4">
                    <div class="input-box">
                        <label class="label-text">Discount coupon</label>
                        <div class="form-group">
                            <span class="la la-percent form-icon"></span>
                            <input class="form-control" type="text" wire:model.defer="promocode">
                        </div>
                    </div>
                </div>


            </div>
            {{ Breadcrumbs::render('switch-plan') }}
        </div><!-- end breadcrumb-content -->
        <div class="row">
            @foreach($plans as $plan)
                <div class="col-lg-4">
                    <div class="block-card dashboard-card mb-4">
                        <div class="block-card-body">
                         <div class="d-flex justify-content-between">
                             <h4>{{ $plan->title }}</h4>
                             <span>{{ $plan->price }}/{{ $plan->period }}</span>
                         </div>
                         <hr>
                            <div class="d-flex align-items-center justify-content-center">
                                <span>{{ __('Plan\'s Benefits') }}</span>
                            </div>

                            <ul class="line-height-55">
                                <li>{{ __('Limit listings') }}: {{ $plan->feature->limit }}</li>
                                <li>{{ $plan->feature->days_long }}-day Long Listing</li>
                                <li>{{ __('Built-in Messenger') }}</li>
                                <li><i class="la {{ $plan->name == '3_listing' ? 'la-close text-danger' : 'la-check text-success' }} mr-2"></i>{{ __('Post Auto-Renewal') }} {{ $plan->name == '3_listing' ? '(Manual)' : '' }}</li>
                                <li><i class="la {{ $plan->name == '3_listing' ? 'la-close text-danger' : 'la-check text-success' }} mr-2"></i>{{ __('Calendar Feature') }}</li>
                            </ul>
                            <hr>
                            <div class="d-flex justify-content-center">

                                @if(auth()->user()->plan->name == $plan->name)
                                    <a href="javascript:void(0)" class="theme-btn border-2">{{ __('You are using this tariff plan') }}</a>
                                @else
                                    <a href="javascript:void(0)" wire:click="changePlan({{ $plan->id }})" class="theme-btn gradient-btn border-2">{{ __('Switch to this tariff plan') }}<i class="la la-arrow-right ml-2"></i></a>
                                @endif
                            </div>
                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                </div>
            @endforeach
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->
</div>
