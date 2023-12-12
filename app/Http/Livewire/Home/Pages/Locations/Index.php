<?php

namespace App\Http\Livewire\Home\Pages\Locations;

use App\Repositories\CountryRepository;
use App\Traits\HasSeo;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, SEOTools, HasSeo;
    protected $paginationTheme = 'bootstrap';

    public $seoTag = 'locations';

    public function render()
    {
        $this->getSeo();

        $countries = (new CountryRepository)->model->paginate(24);

        return view('livewire.home.pages.locations.index', compact('countries'))->extends('layouts.home');
    }
}
