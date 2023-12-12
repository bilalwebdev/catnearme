<?php

namespace App\Http\Livewire\Account;

use App\Models\Country;
use App\Models\Plan;
use App\Repositories\UserRepository;
use App\Rules\Account\Password;
use App\Rules\Account\PasswordForbidden;
use App\Rules\Account\PhoneNumber;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $account = [
        'country_id' => null
    ];

    protected function messages()
    {
        return [
            'account.first_name.required'          => __('First Name cannot be empty'),
            'account.last_name.required'           => __('Last Name cannot be empty'),
            'account.country_id.required'          => __('Country cannot be empty'),
            'account.phone_number.required'        => __('Phone Number cannot be empty'),
            'account.username.required'            => __('Username cannot be empty'),
            'account.username.unique'              => __('Username is occupied by another user'),
            'account.email.required'               => __('Email address cannot be empty'),
            'account.email.email'                  => __('Incorrect e-mail address'),
            'account.email.unique'                 => __('Email address is occupied by another user'),
            'account.password.required'            => __('Password cannot be empty'),
            'account.password.min'                 => __('Password have to be 8 symbols or more'),
            'account.terms.required'               => __('Agreement must be accepted'),
        ];
    }

    public function register($type)
    {

        $validated = $this->validate([
            'account.first_name'    => ['required'],
            'account.last_name'     => ['required'],
            'account.username'      => ['required' , 'string', 'unique:users,username'],
            'account.email'         => ['required' , 'email', 'unique:users,email'],
            'account.password'      => ['required' , 'min:8', new Password, new PasswordForbidden],
            'account.country_id'    => ['required'],
            'account.phone_number'  => ['required', new PhoneNumber],
            'account.terms'         => ['required']
        ]);

        $geo = (new UserRepository)->getGeo();
        $validated = collect($validated['account']);

        if (isset($geo['lat']) && isset($geo['lon'])) {
            $validated->merge([
                'lat' => $geo['lat'],
                'lng' => $geo['lon']
            ]);
        }

        $user = (new UserRepository)->createAccount($validated->toArray(), $type);

        Auth::login($user);

        return redirect()->route('dashboard');
    }


    public function render()
    {
        $counries = Country::all();

        return view('livewire.account.register', compact('counries'));
    }
}
