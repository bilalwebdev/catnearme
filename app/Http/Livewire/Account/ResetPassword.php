<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetPassword extends Component
{
    public $email;

    public function sendReset()
    {
        $validated = $this->validate([
            'email' => ['required' , 'email']
        ]);

        Password::sendResetLink($validated);

        $this->dispatchBrowserEvent('toast-success' , ['message' => 'Password recovery request has been sent to the email address']);
    }

    public function render()
    {
        return view('livewire.account.reset-password');
    }
}
