<?php

namespace App\Http\Livewire\Dashboard\Profile;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Rules\Account\Password;
use App\Rules\Account\PasswordForbidden;
use App\Rules\Account\PhoneNumber;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Nova\Testing\Browser\Pages\Forbidden;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads, SEOTools;

    protected $listeners = ['render'];

    public $user;

    public $password;

    public $avatar;

    public $documents;

    public function mount()
    {
        $this->user = auth()->user()->toArray();
    }

    public function messages()
    {
        return [
            'documents.utility_bill'                  => __('Utility Bill must be specified'),
            'documents.cat_association'               => __('Cat Association must be specified'),
            'password.current_password.required'      => __('The current password cannot be empty'),
            'password.new_password.required'          => __('The password cannot be empty'),
            'password.password_confirmation.required' => __('The password confirmation cannot be empty'),
            'password.password_confirmation.same'     => __('The Confirm New Password field must match New Password field'),
        ];
    }

    public function save()
    {
        $validated = $this->validate([
            'user.name'         => ['nullable'],
            'user.username'     => ['required'],
            'user.phone_number' => ['nullable', new PhoneNumber],
            'user.email'        => ['nullable'],
            'user.address'      => ['nullable'],
            'user.lat'          => ['nullable'],
            'user.lng'          => ['nullable']
        ]);

        auth()->user()->update($validated['user']);

        $this->dispatchBrowserEvent('toast-success' , ['message' => __('Profile information has been updated')]);
    }

    public function updatedAvatar(TemporaryUploadedFile $temporaryUploadedFile)
    {
        $this->validate([
            'avatar'=> ['required' , 'image']
        ]);

        $fileName = $temporaryUploadedFile->getClientOriginalName();

        auth()->user()->addMediaFromStream($temporaryUploadedFile->get())
            ->usingFileName($fileName)
            ->toMediaCollection('avatar');
    }

    public function changePassword()
    {
        $validated = $this->validate([
            'password.current_password'           => ['required' , new Password, new PasswordForbidden],
            'password.new_password'               => ['required', new Password, new PasswordForbidden],
            'password.password_confirmation'      => ['required' , 'same:password.new_password', new PasswordForbidden]
        ]);

        if (! Hash::check($validated['password']['current_password'], auth()->user()->password)) {
            return throw ValidationException::withMessages(['password.current_password' => 'The Current Password is not correct']);
        }

        if (Hash::check($validated['password']['new_password'], auth()->user()->password)) {
            return throw ValidationException::withMessages(['password.new_password' => 'Can\'t be changed to the same password']);
        }

        else {

            auth()->user()->update([
                'password' => Hash::make($validated['password']['password_confirmation'])
            ]);

            $this->reset('password');
            $this->dispatchBrowserEvent('toast-success' , ['message' => __('Password Successfully Changed') ]);
        }
    }

    public function sendDocument()
    {
        try {

            $validated = $this->validate([
                'documents.utility_bill'    => ['required' , 'file'],
                'documents.cat_association' => ['required' , 'file'],
            ]);

            $document = auth()->user()->document()->updateOrCreate(['user_id' => auth()->id()], [
                'status' => 'submitted'
            ]);

            foreach ($this->documents as $k => $documentItem) {
                $document->addMediaFromStream($documentItem->get())->usingFileName($documentItem->getClientOriginalName())->toMediaCollection($k);
            }

        } catch (\Exception $exception) {
            $this->dispatchBrowserEvent('toast-error' , ['message' => $exception->getMessage()]);
        }
    }

    public function render()
    {
        $this->seo()->setTitle('My Profile');

        return view('livewire.dashboard.profile.profile')->extends('layouts.dashboard');
    }
}
