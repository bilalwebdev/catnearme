<?php

namespace App\Http\Livewire\Home\Pages\Info;

use App\Models\Page;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Index extends Component
{
    use SEOTools;

    public Page $page;

    public function render()
    {
        $this->seo()->setTitle($this->page->title);

        return view('livewire.home.pages.info.index')->extends('layouts.home');
    }
}
