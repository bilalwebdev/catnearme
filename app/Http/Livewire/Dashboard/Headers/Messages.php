<?php

namespace App\Http\Livewire\Dashboard\Headers;

use Livewire\Component;
use Musonza\Chat\Facades\ChatFacade;

class Messages extends Component
{
    public function render()
    {
        $conversations = ChatFacade::conversations()->setParticipant(auth()->user())->isPrivate()->limit(5)->get();

        $unreadCount = ChatFacade::messages()->setParticipant(auth()->user())->unreadCount();

        return view('livewire.dashboard.headers.messages', compact('conversations' , 'unreadCount'));
    }
}
