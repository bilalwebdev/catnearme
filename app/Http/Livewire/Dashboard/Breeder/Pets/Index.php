<?php

namespace App\Http\Livewire\Dashboard\Breeder\Pets;

use App\Models\Pet;
use App\Repositories\PetRepository;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, SEOTools;

    protected $paginationTheme = 'bootstrap';
    public function delete(Pet $pet)
    {
        $pet->delete();
    }

    /**
     * @param Pet $pet
     * @return void
     */

    public function renew(Pet $pet) : void
    {
        $renew = (new PetRepository)->renew($pet);

        if ($renew) {
            $this->dispatchBrowserEvent('toast-success', ['message' => 'Your post is back on the listing']);
        }
    }

    public function render()
    {
        $pets =  auth()->user()->pets()->orderByDesc('created_at')->paginate(5);

        $this->seo()->setTitle('Pets Listings');

        return view('livewire.dashboard.breeder.pets.index', compact('pets'))->extends('layouts.dashboard');
    }
}
