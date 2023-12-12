<div>
    <!-- Modal -->
    <div class="modal fade modal-container login-form" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h5 class="modal-title" id="loginModalTitle">Hey, Welcome back!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times-circle"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="auth" class="form-box">

                        <x-home.ui.input-box icon="la la-user" title="{{ __('Email') }}" placeholder="{{ __('Email address') }}" wire:model.defer="account.email" />

                        <x-home.ui.input-box-password icon="la la-lock" title="{{ __('Password') }}" placeholder="{{ __('Enter password') }}" wire:model.defer="account.password"  />

                        <div class="input-box d-flex align-items-center justify-content-between pb-4 user-action-meta">
                            <x-home.ui.custom-checkbox title="{{ __('Keep me signed in') }}" wire:model.defer="account.agree"  />
                            <a href="javascript:void(0)" class="margin-bottom-10px lost-pass-btn font-size-14">{{ __('Lost Password?') }}</a>
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="theme-btn gradient-btn w-100">
                                <i class="la la-sign-in mr-1"></i> {{ __('Login to Account') }}
                            </button>
                            <p class="sub-text-box text-right pt-1 font-weight-medium font-size-14">
                                New to {{ config('app.name') }}? <a class="text-color-2 signup-btn" href="javascript:void(0)">{{ __('Create account') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
