<?php

namespace App\Http\Livewire\Home\Pages\Listings;

use App\Models\Family;
use App\Models\Pet;
use App\Models\User;
use App\Repositories\ConversationRepository;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Musonza\Chat\Chat;
use Musonza\Chat\Facades\ChatFacade;
use Musonza\Chat\Models\Conversation;

class Show extends Component
{
    use SEOTools;

    public Pet $pet;

    public $vactinations = [];
    public $certifications = [];
    public $parents;
    public $faqs;

    public $events = [];

    public $modal;

    public function mount()
    {
        $this->vactinations   = $this->pet?->vactinations?->toArray();
        $this->certifications = $this->pet?->certifications?->toArray();
        $this->parents        = $this->pet?->parents;
        $this->faqs           = $this->pet?->user->faqs;
        $this->events         = auth()?->user()?->calendar;
    }

    public function showModal(Family $family)
    {
        $this->modal = $family;
    }

    public function sendMessage()
    {
        $userTo = $this->pet->user;

        $conversation = (new ConversationRepository)->openDialog($userTo);

        return redirect()->route('dashboard.chat' , ['conversation' => $conversation->id]);
    }

    public function render()
    {
        $this->pet->increment('views', 1);

        if (auth()->check()) {
            auth()->user()->vieweds()->firstOrCreate([
                'pet_id' => $this->pet->id
            ]);
        }
        $this->seo()->setTitle($this->pet->title);

        return view('livewire.home.pages.listings.show')->extends('layouts.home');
    }
}
