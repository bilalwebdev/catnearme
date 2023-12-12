<?php

namespace App\Http\Livewire\Home\Sections;

use App\Repositories\BreedRepository;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $breeds = (new BreedRepository)->getAllLimit(6);

        return view('livewire.home.sections.footer', compact('breeds'));
    }
}
