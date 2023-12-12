<?php

namespace App\Http\Livewire\Account;

use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public $account = [
        'agree' => false
    ];

    protected function messages() {
        return [
            'account.email.required'    => __('Email address cannot be empty'),
            'account.email.exists'      => __('There is no such email'),
            'account.password.required' => __('Password cannot be empty'),
            'account.password.min'      => __('The password must be more than :min characters'),
            'account.password.regex'    => __('The password must contain at least one lowercase letter and a number. The password must be at least 3 characters long.'),
        ];
    }

    public function auth()
    {
        $validated = $this->validate([
            'account.email' => ['required' , 'exists:users,email'],
            'account.password' => ['required']
        ]);

        if (! Auth::attempt($validated['account']) ) {
            return throw ValidationException::withMessages(['account.password' => __('Incorrect password or Email') ]);
        }

        request()->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.account.login')->extends('layouts.home');
    }
}
