<?php

namespace App\Http\Livewire\Home\Sections;

use App\Repositories\BreedRepository;
use App\Repositories\CategoryRepository;
use Livewire\Component;

class Breeds extends Component
{
    public function render()
    {
        $breeds = (new BreedRepository)->getAllLimit();

        return view('livewire.home.sections.breeds', compact('breeds'));
    }
}
