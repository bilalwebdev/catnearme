<?php

namespace App\Repositories;

use App\Models\User;
use Musonza\Chat\Facades\ChatFacade;

class ConversationRepository
{
    public function openDialog(User $to)
    {
        if (! $conversation = ChatFacade::conversations()->between(auth()->user(), $to)) {

            $participants = [auth()->user(), $to];

            $conversation = ChatFacade::createConversation($participants)->makePrivate(true);

            ChatFacade::message('Hi, I have a question I was wondering if you could discuss with me.')
                ->from(auth()->user())
                ->to($conversation)
                ->send();
        }

        return $conversation;
    }

    public function notificationChat(User $to, ?string $message = 'Hello to platform')
    {
        $bot          = User::find(1);

        if (! $conversation = ChatFacade::conversations()->between($bot, $to)) {
            $conversation = ChatFacade::createConversation([$bot , $to])->makePrivate();
        }

        ChatFacade::message($message)
            ->from($bot)
            ->to($conversation)
            ->send();

        return $conversation;

    }

    public function notificationBotList(User $to)
    {
        $bot = User::find(1);

        return  ChatFacade::conversations()->setParticipant(auth()->user(), $bot)->get();
    }
}
