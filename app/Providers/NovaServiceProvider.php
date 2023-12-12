<?php

namespace App\Providers;

use App\Nova\Advert;
use App\Nova\Blog;
use App\Nova\Breed;
use App\Nova\Category;
use App\Nova\ContactForm;
use App\Nova\Country;
use App\Nova\Dashboards\Main;
use App\Nova\Document;
use App\Nova\Family;
use App\Nova\Feature;
use App\Nova\Page;
use App\Nova\Pet;
use App\Nova\Plan;
use App\Nova\Seo;
use App\Nova\Setting;
use App\Nova\User;
use App\Nova\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Oneduo\NovaFileManager\NovaFileManager;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(function (Request $request) {
            return [

                MenuSection::make('Manage', [
                    MenuItem::resource(Category::class),
                    MenuItem::resource(Breed::class),
                    MenuItem::resource(Blog::class),
                    MenuItem::resource(ContactForm::class),
                    MenuItem::resource(Country::class),
                    MenuItem::resource(Document::class),
                    MenuItem::resource(Page::class),
                    MenuItem::resource(User::class),
                    MenuItem::resource(Video::class),
                ])->icon('Pencil')->collapsable(),

                MenuSection::make('Marketing', [
                    MenuItem::resource(Advert::class),
                    MenuItem::resource(Seo::class)
                ])->icon('Collection')->collapsable(false),

                MenuSection::make('Pets', [
                    MenuItem::resource(Pet::class),
                    MenuItem::resource(Family::class),
                ])->icon('ViewList')->collapsable(false),

                MenuSection::make('Plan', [
                    MenuItem::resource(Plan::class),
                    MenuItem::resource(Feature::class),
                ])->icon('Cash')->collapsable(false),

                MenuSection::make('Others', [
                    MenuItem::resource(Setting::class),
                ])->icon('Chip')->collapsable(false),

            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return (bool)$user->is_admin;
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools() : array
    {
        return [
            //
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
