<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {

    Route::get('/', \App\Http\Livewire\Home\Pages\Index::class)->name('home');
    Route::get('/about-us', \App\Http\Livewire\Home\Pages\About::class)->name('about');
    Route::get('/contacts', \App\Http\Livewire\Home\Pages\Contacts::class)->name('contacts');

    Route::prefix('/pages')->group(function () {

        Route::get('/breeds', \App\Http\Livewire\Home\Pages\Breeds\Index::class)->name('page.breeds');
        Route::get('/locations', \App\Http\Livewire\Home\Pages\Locations\Index::class)->name('page.locations');

        Route::get('/{page}', \App\Http\Livewire\Home\Pages\Info\Index::class)->name('page.info');

    });

    Route::prefix('cats-and-kittens-for-sale')->group(function () {
        // this route for listings, breeds in admin and user and for search query and main listing page
        Route::get('/', \App\Http\Livewire\Home\Pages\Listings\Index::class)->name('listings');
        // this route for listing breed only SEO-friendly only frontend
        Route::get('/{breed}', \App\Http\Livewire\Home\Pages\Listings\IndexBreed::class)->name('listings.withbreed');
        // this route for showing pets in admin and user area
        Route::get('/show/{pet}', \App\Http\Livewire\Home\Pages\Listings\Show::class)->name('listings.show');
        // this route for showing pets SEO-friendly frontend only
        Route::get('/{breed}/{pet}', \App\Http\Livewire\Home\Pages\Listings\Show::class)->name('listings.showslug');
    });

    Route::prefix('family')->group(function () {
        Route::get('/show/{family}', \App\Http\Livewire\Home\Pages\Family\Show::class)->name('family.show');
    });

    Route::prefix('pets')->group(function () {
        Route::get('/add', \App\Http\Livewire\Home\Pages\Pets\Add::class)->name('pets.add');
        Route::get('/edit/{pet}', \App\Http\Livewire\Home\Pages\Pets\Edit::class)
            ->middleware('check.post.permissions')
            ->name('pets.edit');

        Route::prefix('family')->group(function () {
            Route::get('/edit/{family}', \App\Http\Livewire\Home\Pages\Pets\Family\Edit::class)->name('pet.family.edit');
        });
    });

    Route::prefix('blog')->group(function () {
        Route::get('/', \App\Http\Livewire\Home\Pages\Blog\Blog::class)->name('blog');
        Route::get('/show/{blog}', \App\Http\Livewire\Home\Pages\Blog\Detail::class)->name('blog.detail');
    });

    Route::prefix('profile')->group(function () {
        // Route::get('/{breed}/{pet}', \App\Http\Livewire\Home\Pages\Listings\Show::class)->name('listings.showslug');
        // route('listings.showslug', [$listing->breed->slug,$listing->slug])
        // now: http://127.0.0.1:8000/profile/breeder/3
        // should be: http://127.0.0.1:8000/profile/breeder/thieldannie
        $nope = \App\Http\Livewire\Home\Pages\Listings\Show::class;
        Route::get('/breeder/{user}', \App\Http\Livewire\Home\User\Profile::class)->name('user.breeder.profile');
    });
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Dashboard\Index::class)->name('dashboard');

    Route::prefix('/messages')->group(function () {
        Route::get('/chat', \App\Http\Livewire\Dashboard\Messages\Chat::class)->name('dashboard.chat');
    });

    Route::prefix('/faqs')->group(function () {
        Route::get('/', \App\Http\Livewire\Dashboard\Breeder\Faq\Index::class)->name('dashboard.faqs');
    });

    Route::prefix('/reviews')->group(function () {
        Route::get('/', \App\Http\Livewire\Dashboard\Breeder\Reviews\Index::class)->name('dashboard.reviews');
    });

    Route::prefix('/parents')->group(function () {
        Route::get('/', \App\Http\Livewire\Dashboard\Breeder\Parents\Index::class)->name('dashboard.parents');
        Route::get('/add', \App\Http\Livewire\Dashboard\Breeder\Parents\Add::class)->name('dashboard.parents.add');
        Route::get('/edit/{family}', \App\Http\Livewire\Dashboard\Breeder\Parents\Edit::class)->name('dashboard.parents.edit');
    });

    Route::prefix('/calendar')->group(function () {
        Route::get('/', \App\Http\Livewire\Dashboard\Breeder\Calendar::class)->name('dashboard.calendar');
    });

    Route::prefix('pets')->group(function () {
        Route::get('/', \App\Http\Livewire\Dashboard\Breeder\Pets\Index::class)->name('dashboard.listing');
        Route::get('/link-pet/{pet}', \App\Http\Livewire\Dashboard\Breeder\Pets\LinkPet::class)->name('dashboard.link.pet');
    });

    Route::prefix('subscription')->group(function () {
        Route::get('/switch-plan', \App\Http\Livewire\Dashboard\Breeder\SwitchPlan::class)->name('dashboard.switch.plan');
        Route::get('/purchase/{plan}', \App\Http\Livewire\Dashboard\Breeder\Subscribe\Purchase::class)->name('dashboard.subscribe.purchase');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', \App\Http\Livewire\Dashboard\Profile\Profile::class)->name('dashboard.profile');
    });

    // client

    Route::prefix('favorites')->group(function () {
        Route::get('/', \App\Http\Livewire\Dashboard\Client\Favorites::class)->name('dashboard.favorites');
    });

    Route::prefix('vieweds')->group(function () {
        Route::get('/', \App\Http\Livewire\Dashboard\Client\Viewed::class)->name('dashboard.vieweds');
    });
});

Route::prefix('/stripe')->group(function () {
    Route::post('/webhook', [\App\Http\Controllers\Payments\StripeController::class, 'handle'])->name('stripe.handle');
    Route::prefix('checkout')->group(function () {
        Route::get('/success', \App\Http\Livewire\Home\Checkout\Success::class)->name('payment.success');
    });
});

Route::prefix('session')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\SessionController::class, 'logout'])->name('logout');
});

Route::prefix('account')->middleware('guest')->group(function () {
    Route::get('new-password/{token}', \App\Http\Livewire\Account\NewPassword::class)->name('account.new-password');
});

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::prefix('/sitemap')->group(function () {
    Route::get('/posts.xml', [SitemapController::class, 'posts']);
    Route::get('/categories.xml', [SitemapController::class, 'categories']);
    Route::get('/pets.xml', [SitemapController::class, 'pets']);
    Route::get('/breeds.xml', [SitemapController::class, 'breeds']);
    Route::get('/pages.xml', [SitemapController::class, 'pages']);
    Route::get('/countries.xml', [SitemapController::class, 'countries']);
});
