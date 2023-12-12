<?php

namespace App\Http\Livewire\Dashboard\Breeder\Parents;

use App\Models\Family;
use Livewire\Component;

class Index extends Component
{

    public function delete(Family $family)
    {
        $family->clearMediaCollection();

        $family->delete();
    }

    public function render()
    {
        $parents = auth()->user()->family;

        return view('livewire.dashboard.breeder.parents.index', compact('parents'))->extends('layouts.dashboard');
    }
}
