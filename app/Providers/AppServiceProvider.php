<?php

namespace App\Providers;

use App\Models\Advert;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (request()->is('dashboard/*')) {
            SEOTools::metatags()->setTitleDefault('Dashboard');
        }

        try {
            View::share('setting', Setting::first());
        } catch (\Exception $exception) {}


        View::composer('layouts.dashboard', function (\Illuminate\View\View $view) {
            $dashboard_adverts  = Advert::where('position' , 'left_dashboard')->active()->get();
            $view->with('dashboard_adverts' ,   $dashboard_adverts);
        });
    }
}
