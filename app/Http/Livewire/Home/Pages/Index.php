<?php

namespace App\Http\Livewire\Home\Pages;

use App\Repositories\VideoRepository;
use App\Traits\HasSeo;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Index extends Component
{
    use SEOTools, HasSeo;

    public $seoTag = 'home';

    public function render()
    {
        $this->getSeo();

        $video = (new VideoRepository)->getHomeVideo();

        return view('livewire.home.pages.index', compact('video'))->extends('layouts.home');
    }
}
