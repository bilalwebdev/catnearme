<?php

namespace App\Http\Livewire\Home\Pages;

use App\Repositories\SeoRepository;
use App\Traits\HasSeo;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class About extends Component
{
    use SEOTools, HasSeo;

    public $seoTag = 'about';

    public function render()
    {
        $this->getSeo();

        return view('livewire.home.pages.about')->extends('layouts.home');
    }
}
