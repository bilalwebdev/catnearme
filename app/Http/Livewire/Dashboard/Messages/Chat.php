<?php

namespace App\Http\Livewire\Dashboard\Messages;

use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Musonza\Chat\Facades\ChatFacade;

class Chat extends Component
{
    use SEOTools;

    protected $listeners = ['render' , 'messages'];

    public $message;

    public $conversation;

    public function messages()
    {
        $this->dispatchBrowserEvent('updateChat');
    }

    public function mount()
    {
        $this->conversation = ChatFacade::conversations()->getById(request('conversation'));

        if (! is_null($this->conversation)) {
            ChatFacade::conversation($this->conversation)->setParticipant(auth()->user())->readAll();
        }

    }

    public function send($text)
    {
        if ($text == '') return false;

        $conversation = ChatFacade::conversations()->getById($this->conversation->id);

        $message = ChatFacade::message($text)
            ->from(auth()->user())
            ->to($conversation)
            ->send();

        $this->reset('message');

        $this->emit('render');
    }

    public function render()
    {
        $this->seo()->setTitle('Chat');

        $conversations = ChatFacade::conversations()->setParticipant(auth()->user())->isPrivate()->get();

        $participants = $this?->conversation?->getParticipants()?->filter(function ($item) {
            return $item->id !== auth()->id();
        })?->first();

        $messages     = $this->conversation?->messages;

        return view('livewire.dashboard.messages.chat', compact('conversations' , 'participants' , 'messages'))->extends('layouts.dashboard');
    }
}
