<?php

namespace App\Http\Livewire\Dashboard\Breeder\Subscribe;

use App\Models\Plan;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Purchase extends Component
{
    public Plan $plan;

    use SEOTools;

    public function render()
    {
        $this->seo()->setTitle(__('Purchase plan' . ' ' . $this->plan->name), false);

        $intent = auth()->user()->createSetupIntent();

        return view('livewire.dashboard.breeder.subscribe.purchase', compact('intent'))->extends('layouts.dashboard');
    }
}
