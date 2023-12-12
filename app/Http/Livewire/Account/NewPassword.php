<?php

namespace App\Http\Livewire\Account;

use App\Models\User;
use App\Notifications\User\PasswordNewChange;
use App\Repositories\ConversationRepository;
use App\Rules\Account\PasswordForbidden;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

class NewPassword extends Component
{
    public bool $active = false;

    public $token = null;
    public $email = null;

    public $password;

    protected $queryString = ['token' , 'email'];

    public function setNewPassword()
    {
        $validated = $this->validate([
            'email'    => 'required',
            'password' => ['required' , new PasswordForbidden , new \App\Rules\Account\Password],
            'token'    => 'required',
        ]);

        $status = Password::reset(
            $validated,
            function (User $user, string $password) {

                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));

                Auth::login($user);

                (new ConversationRepository)->notificationChat(
                    $user ,
                    "Your password has been changed successfully. You can now login with your new password."
                );

                Notification::sendNow($user , new PasswordNewChange($this->password));
            }
        );

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.account.new-password');
    }
}
