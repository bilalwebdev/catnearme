<div>
    <!-- Modal -->
    <div class="modal fade modal-container signup-form" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h5 class="modal-title" id="signUpModalTitle">Welcome! create your {{ config('app.name') }} account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times-circle"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent class="form-box">

                        <div class="row">

                            <div class="col-lg-6">
                                <x-home.ui.input-box icon="la la-user"
                                                     name="firstName"
                                                     title="{{ __('First Name') }}"
                                                     placeholder="{{ __('Enter First Name') }}"
                                                     wire:model.defer="account.first_name" />
                            </div>

                            <div class="col-lg-6">
                                <x-home.ui.input-box icon="la la-user"
                                                     name="lastName"
                                                     title="{{ __('Last Name') }}"
                                                     placeholder="{{ __('Enter Last Name') }}"
                                                     wire:model.defer="account.last_name" />
                            </div>

                            <div class="col-lg-12">
                                <x-home.ui.input-box icon="la la-user"
                                                     name="userName"
                                                     title="{{ __('Username') }}"
                                                     placeholder="{{ __('Username') }}"
                                                     wire:model.defer="account.username" />
                            </div>

                            <div class="col-lg-12">
                                <x-home.ui.input-box icon="la la-envelope"
                                                     type="email"
                                                     name="email"
                                                     title="{{ __('Email') }}"
                                                     placeholder="{{ __('Email address') }}"
                                                     wire:model.defer="account.email" />
                            </div>

                            <div class="col-lg-12">
                                <x-home.ui.input-box icon="la la-phone"
                                                     type="text"
                                                     name="phoneNumber"
                                                     title="{{ __('Phone Number') }}"
                                                     placeholder="{{ __('111-111-1234') }}"
                                                     wire:model.defer="account.phone_number" />
                            </div>

                            <div class="col-lg-12">
                                <x-home.ui.input-box-password title="{{ __('Password') }}"
                                                              autocomplete="off"
                                                              placeholder="{{ __('Enter password') }}"
                                                              wire:model.defer="account.password" />
                            </div>
                        </div>
                        
                        <x-home.ui.country
                            :options="$counries"
                            :value="$account['country_id']"
                            field="country_id"
                            track_by="id"
                            track_display="name"
                            wire:model="account"
                        />

                        <x-home.ui.custom-checkbox-terms wire:model.defer="account.terms" />

                        <div class="btn-box">

                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="theme-btn gradient-btn w-100 active" wire:click="register('breeder')">
                                        <i class="la la-user-plus mr-1"></i> {{ __('I\'m a breeder') }}
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="theme-btn bg-gradient-4 text-white w-100" wire:click="register('client')">
                                        <i class="la la-user-plus mr-1"></i> {{ __('I\'m a client') }}
                                    </button>
                                </div>
                            </div>

                            <p class="sub-text-box text-right pt-1 font-weight-medium font-size-14">
                                Already on {{ config('app.name') }}? <a class="text-color-2 login-btn" href="javascript:void(0)">{{ __('Log in') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
