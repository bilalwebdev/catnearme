<div>
    <!-- Modal -->
    <div class="modal fade modal-container new-password" id="new-password" tabindex="-1" role="dialog" aria-labelledby="newPasswordModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center mh-bg">
                    <h5 class="modal-title" id="newPasswordModalTitle">New Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times-circle"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-size-15 font-weight-medium pb-3">
                        Set a new password for your account
                    </p>
                    <div class="form-box">
                        <x-home.ui.input-box icon="la la-user" title="{{ __('Email') }}" placeholder="{{ __('Email address') }}" wire:model.defer="email" readonly disabled />
                        <x-home.ui.input-box-password icon="la la-user" title="{{ __('New Password') }}" placeholder="{{ __('Set new password') }}" wire:model.defer="password"/>
                        <div class="btn-box">
                            <button type="submit" class="theme-btn gradient-btn w-100" wire:click="setNewPassword">
                                Update password <i class="la la-arrow-right ml-1"></i>
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
