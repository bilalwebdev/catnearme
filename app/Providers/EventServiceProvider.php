<?php

namespace App\Providers;

use App\Listeners\StripeEventListener;
use App\Models\Document;
use App\Models\User;
use App\Notifications\User\PasswordNewChange;
use App\Observers\DocumentObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Laravel\Cashier\Events\WebhookReceived;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        PasswordReset::class => [
         //   PasswordNewChange::class
        ],

        WebhookReceived::class => [
          //  StripeEventListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Document::observe(DocumentObserver::class);
        User::observe(UserObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
