<?php

namespace App\Observers;

use App\Models\Document;
use App\Notifications\Breeder\Notify\SendVerify;
use App\Repositories\ConversationRepository;

use Illuminate\Support\Facades\Notification;

class DocumentObserver
{
    /**
     * Handle the Document "created" event.
     */
    public function created(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "updated" event.
     */
    public function updated(Document $document): void
    {
        if ($document->status == 'verified') {

            $document->user()->update(['is_verify' => 1]);

            Notification::sendNow($document->user , new SendVerify);

            (new ConversationRepository)->notificationChat($document->user , __('Your account has been upgraded to "Verified" after your documents were examined. Priority showings and other premium services are now available to your account as per our plans.'));
        }
    }

    /**
     * Handle the Document "deleted" event.
     */
    public function deleted(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "restored" event.
     */
    public function restored(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "force deleted" event.
     */
    public function forceDeleted(Document $document): void
    {
        //
    }
}
