<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('breeder', function (User $user) {
            return $user->type === 'breeder';
        });

        Gate::define('author', function (User $user, Pet $pet) {
            return $user->id == $pet->user->id;
        });

        Gate::define('notAuthor', function (User $user, Pet $pet) {
            return $user->id !== $pet->user->id;
        });

        Gate::define('client', function (User $user) {
            return $user->type === 'client';
        });

        Gate::define('is_free', function (User $user) {
            return $user->plan->name == '3_listing';
        });

        Gate::define('is_plan', function (User $user) {
            return $user->plan->name !== '3_listing';
        });
    }
}
