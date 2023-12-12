<?php

namespace App\Http\Livewire\Home\Sections;

use App\Repositories\PetRepository;
use Livewire\Component;

class VerifyBreeders extends Component
{
    public function render()
    {
        $pets = (new PetRepository)->verify();

        return view('livewire.home.sections.verify-breeders', compact('pets'));
    }
}
