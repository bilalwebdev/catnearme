<?php

namespace App\Http\Livewire\Home\Sections;

use App\Models\Breed;
use App\Models\Country;
use App\Repositories\BreedRepository;
use Livewire\Component;

class Search extends Component
{
    public $search = null;

    public function search()
    {
        if (is_null($this->search)) {
            $this->dispatchBrowserEvent('toast-error' , ['message' => __('No parameter is selected for the search') ]);
            return false;
        }

        $searchQuery = http_build_query($this->search);

        return redirect()->route('listings' , $searchQuery);
    }

    public function render()
    {
        $popularSearches = (new BreedRepository)->getPopular(10);

        $countries       = Country::all();

        $breeds          = Breed::all();

        return view('livewire.home.sections.search', compact('popularSearches' , 'countries' , 'breeds'));
    }
}
