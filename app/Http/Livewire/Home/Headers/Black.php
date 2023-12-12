<?php

namespace App\Http\Livewire\Home\Headers;

use App\Repositories\BreedRepository;
use Livewire\Component;

class Black extends Component
{
    public function render()
    {
        $breeds = (new BreedRepository)->model->get();

        return view('livewire.home.headers.black', compact('breeds'));
    }
}
