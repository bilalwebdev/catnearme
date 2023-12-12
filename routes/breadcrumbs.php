<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

Breadcrumbs::for('pages', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
});

Breadcrumbs::for('breeds', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('All Breeds', route('page.breeds'));
});

Breadcrumbs::for('page', function (BreadcrumbTrail $trail, \App\Models\Page $page) {
    $trail->parent('pages');
    $trail->push($page->title, route('page.info', $page));
});

Breadcrumbs::for('locations', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('All Locations', route('page.locations'));
});

Breadcrumbs::for('blog-detail', function (BreadcrumbTrail $trail, \App\Models\Blog $blog) {
    $trail->parent('blog');
    $trail->push($blog->title);
});



Breadcrumbs::for('about-us', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('About Us', route('about'));
});

Breadcrumbs::for('listings', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Listings', route('listings'));
    $trail->push('Listing Fullwidth Map', null);
});

Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contacts', route('contacts'));
});

Breadcrumbs::for('add-post', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Add post');
});

Breadcrumbs::for('edit-post', function (BreadcrumbTrail $trail, \App\Models\Pet $pet) {
    $trail->parent('home');
    $trail->push('Edit');
    $trail->push($pet->title);
});


Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});


Breadcrumbs::for('calendar', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Calendar', route('dashboard.calendar'));
});

Breadcrumbs::for('parents', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Parents', route('dashboard.parents'));
});

Breadcrumbs::for('add-parent', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Add Parent', route('dashboard.parents.add'));
});

Breadcrumbs::for('edit-parent', function (BreadcrumbTrail $trail, \App\Models\Family $family) {
    $trail->parent('parents');
    $trail->push('Edit Parent', route('dashboard.parents.edit', $family));
});

Breadcrumbs::for('link-parents', function (BreadcrumbTrail $trail, \App\Models\Pet $pet) {
    $trail->parent('dashboard');
    $trail->push('Link pets parent', route('dashboard.link.pet', $pet));
});


Breadcrumbs::for('switch-plan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Switch Plan', route('dashboard.switch.plan'));
});

Breadcrumbs::for('chat', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Chat', route('dashboard.chat'));
});

Breadcrumbs::for('my-listing', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('My Listing', route('dashboard.listing'));
});

Breadcrumbs::for('my-profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('My Profile', route('dashboard.listing'));
});

Breadcrumbs::for('reviews', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Reviews', route('dashboard.reviews'));
});

Breadcrumbs::for('faqs', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Faqs', route('dashboard.faqs'));
});


//client

Breadcrumbs::for('vieweds', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Vieweds');
});

Breadcrumbs::for('favorites', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Favorites');
});

