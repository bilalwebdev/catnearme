<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Advert;
use App\Repositories\UserRepository;
use Livewire\Component;
use Musonza\Chat\Facades\ChatFacade;

class Index extends Component
{
    public function render()
    {
        $conversations = ChatFacade::conversations()->setParticipant(auth()->user())->isPrivate()->get();

        if (auth()->user()->can('breeder')) {
            return view('livewire.dashboard.breeder.index', compact('conversations'))->extends('layouts.dashboard');
        } elseif(auth()->user()->can('client')) {
            return view('livewire.dashboard.client.index',  compact('conversations'))->extends('layouts.dashboard');
        }
    }
}
