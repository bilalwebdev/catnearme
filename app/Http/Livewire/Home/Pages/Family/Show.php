<?php

namespace App\Http\Livewire\Home\Pages\Family;

use App\Models\Family;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Show extends Component
{
    use SEOTools;

    public Family $family;

    public function render()
    {

        $this->seo()->setTitle('Parents kitten ' . $this->family->name);

        return view('livewire.home.pages.family.show')->extends('layouts.home');
    }
}
