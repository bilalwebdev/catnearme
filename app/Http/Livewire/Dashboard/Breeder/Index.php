<?php

namespace App\Http\Livewire\Dashboard\Breeder;

use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Index extends Component
{
    use SEOTools;

    public function render()
    {
        $this->seo()->setTitle('Dashboard', false);

        return view('livewire.dashboard.breeder.index')->extends('layouts.dashboard');
    }
}
