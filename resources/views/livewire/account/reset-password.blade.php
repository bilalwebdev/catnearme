<div>
    <!-- Modal -->
    <div class="modal fade modal-container recover-form" id="recoverModal" tabindex="-1" role="dialog" aria-labelledby="recoverModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center mh-bg">
                    <h5 class="modal-title" id="recoverModalTitle">Reset password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times-circle"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-size-15 font-weight-medium pb-3">
                        Enter your email to reset your password.
                        You will receive an email with instructions on how to reset your password. If you are experiencing problems
                        resetting your password <a href="{{route('contacts')}}" class="text-color-2">contact us</a> for help.
                    </p>
                    <div class="form-box">
                        <x-home.ui.input-box icon="la la-user" title="{{ __('Email') }}" placeholder="{{ __('Email address') }}" wire:model.defer="email" />
                        <div class="btn-box">
                            <button type="submit" class="theme-btn gradient-btn w-100" wire:click="sendReset">
                                Get New Password <i class="la la-arrow-right ml-1"></i>
                            </button>
                            <p class="sub-text-box text-right pt-1 font-weight-medium font-size-14">
                                Not a member? <a class="text-color-2 signup-btn" href="javascript:void(0)">Create account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
