<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h1 class="sec__title font-size-24 mb-0"> {{ __('Purchase plan') }} - {{ $plan->title }}</h1>
                <span>{{ __('Are you currently purchasing this plan check if everything is correct?') }}</span>
            </div>
            {{ Breadcrumbs::render('switch-plan') }}
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-lg-4">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-body">
                        <div class="d-flex justify-content-between">
                            <h4>{{ $plan->title }}</h4>
                            <span>{{ $plan->price }}</span>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center justify-content-center">
                            {{ $plan->description ?? 'No description' }}
                        </div>

                        <ul class="line-height-55">
                            <li>{{ __('Limit listings') }}: {{ $plan->feature->limit }}</li>
                            <li>{{ __('15-day Long Listing') }}: {{ $plan->feature->days_long }}</li>
                            <li>{{ __('Built-in Messenger') }}</li>
                            <li><i class="la {{ $plan->name == '3_listing' ? 'la-close text-danger' : 'la-check text-success' }} mr-2"></i>{{ __('Post Auto-Renewal (Manual)') }}</li>
                            <li><i class="la {{ $plan->name == '3_listing' ? 'la-close text-danger' : 'la-check text-success' }} mr-2"></i>{{ __('Calendar Feature') }}</li>
                        </ul>
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div>
            <div class="col-lg-8">
                <div class="block-card dashboard-card mb-4">
                    <div class="block-card-body">

                        <input id="card-holder-name" type="text">

                        <div class="d-flex justify-content-between">
                            <h4>Cart details</h4>
                        </div>
                    </div><!-- end block-card-body -->
                </div><!-- end block-card -->
            </div>
        </div>
    </div><!-- end dashboard-inner-body-container -->
    @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe('{{ env('STRIPE_KEY') }}')

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');
        </script>
    @endpush
</div>
