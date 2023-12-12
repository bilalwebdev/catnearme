<?php

namespace App\Http\Livewire\Dashboard\Headers;

use App\Models\User;
use App\Repositories\ConversationRepository;
use Livewire\Component;
use Musonza\Chat\Facades\ChatFacade;

class Alerts extends Component
{
    public function render()
    {
        $notifications = (new ConversationRepository)->notificationBotList(auth()->user());

        $bot = User::find(1);

        $unreadCount = ChatFacade::messages()->setParticipant(auth()->user(), $bot)->unreadCount();

        return view('livewire.dashboard.headers.alerts', compact('notifications' , 'unreadCount'));
    }
}
