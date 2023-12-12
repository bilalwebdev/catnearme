<?php

namespace App\Http\Livewire\Dashboard\Breeder\Reviews;

use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, SEOTools;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $reviews = auth()->user()->reviews()->paginate(5);

        $this->seo()->setTitle('Reviews');

        return view('livewire.dashboard.breeder.reviews.index' , compact('reviews'))->extends('layouts.dashboard');
    }
}
