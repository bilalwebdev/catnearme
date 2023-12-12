<?php

namespace App\Http\Livewire\Home\Pages;

use App\Repositories\ContactsRepository;
use App\Traits\HasSeo;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Contacts extends Component
{

    use SEOTools, HasSeo;

    public $message;

    public $seoTag = 'contacts';

    protected function messages() {
        return [
            'message.name.required' => __('The name must be filled in'),
            'message.email.required' => __('The email must be filled in'),
            'message.email.email' => __('the field must be an e-mail address'),
            'message.subject.required' => __('The subject must be filled in'),
            'message.message.required' => __('The text must be filled in'),
        ];
    }

    public function send()
    {
        $validated = $this->validate([
            'message.name'    => ['required'],
            'message.email'   => ['required' , 'email'],
            'message.subject' => ['required'],
            'message.message' => ['required'],
        ]);

        (new ContactsRepository)->store($validated['message']);

        $this->reset('message');

        return $this->dispatchBrowserEvent('toast-success' , ['message' => __('The message has been sent') ]);
    }

    public function render()
    {
        $this->getSeo();

        return view('livewire.home.pages.contacts')->extends('layouts.home');
    }
}
