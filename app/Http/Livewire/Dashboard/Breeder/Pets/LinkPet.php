<?php

namespace App\Http\Livewire\Dashboard\Breeder\Pets;

use App\Models\Family;
use App\Models\Pet;
use Livewire\Component;

class LinkPet extends Component
{
    public Pet $pet;

    public $parentsLink;

    public function linkParent(Family $family)
    {
        $this->pet->parents()->firstOrCreate(['family_id' => $family->id]);
    }

    public function removeParent(Family $family)
    {
        $this->pet->parents()->where('family_id', $family->id)->delete();
    }

    public function render()
    {
        $parents = auth()->user()->family;

        return view('livewire.dashboard.breeder.pets.link-pet', compact('parents'))->extends('layouts.dashboard');
    }
}
