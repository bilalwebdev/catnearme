<?php

namespace App\Http\Livewire\Home\Pages\Listings;

use App\Models\Advert;
use App\Models\Breed;
use App\Models\Country;
use App\Models\Pet;
use App\Models\User;
use App\Repositories\BreedFilter;
use App\Repositories\BreedRepository;
use App\Repositories\CountryRepository;
use App\Repositories\PetRepository;
use App\Traits\HasSeo;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class IndexBreed extends Component
{

    use SEOTools, WithPagination, HasSeo;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render'];

    

    public $breed = null;
    public $color = null;
    public $country = null;
    public $keywords = null;
    public $breeder = null;
    public $seoTag = null;
    
    public function mount()
    {
     	$this->seoTag='inlineSeo,breeds,'.$this->breed;
        
    }

    public $queryString = [ 'color' , 'country' , 'keywords' , 'breeder'];


    public $colors = [
        ['name' => 'black'],
        ['name' => 'blue'],
        ['name' => 'brown/chocolate'],
        ['name' => 'calico'],
        ['name' => 'chinchilla'],
        ['name' => 'cinnamon'],
        ['name' => 'fawn/lilac'],
        ['name' => 'marbled'],
        ['name' => 'red'],
        ['name' => 'smoked'],
        ['name' => 'tabby'],
        ['name' => 'tortoiseshell'],
        ['name' => 'white'],
        ['name' => 'other'],
    ];

    public function updated()
    {
        $params = ['breed' => $this->breed , 'color' => $this->color, 'country' => $this->country , 'keywords' => $this->keywords];

        $this->dispatchBrowserEvent('reload' , ['q' => http_build_query($params)]);
    }

    public function applyFilter()
    {
        $params = ['breed' => $this->breed , 'color' => $this->color, 'country' => $this->country , 'keywords' => $this->keywords , 'breeder' => $this->breeder];

        $this->dispatchBrowserEvent('reload' , ['q' => http_build_query($params)]);
    }

    public function resetFilters()
    {
        return redirect()->route('listings');
    }

    public function addFavorite(Pet $pet)
    {
        if (auth()->check()) {
            auth()->user()->favorites()->firstOrCreate([
                'pet_id' => $pet->id
            ]);
            $this->dispatchBrowserEvent('toast-success' , ['message' => __('This Listing has been added to favorites') ]);
        }
    }

    public function render()
    {
        $this->getSeo();

        $countries = (new CountryRepository)->model->get();
        $breeds    = (new BreedRepository())->model->get();

        $listings  = (new BreedFilter)->withSearchPercentage(
            $this->breed,
            $this->color,
            $this->country,
            $this->keywords,
            $this->breeder
        );

        $listingItems    = $listings->items();

        $breedersMap     = $listings->keyBy('user_id')->values();

        $countries       = Country::all();

        $left_sidebars   = Advert::where('position' , 'left_sidebar')->active()->get();
        $right_sidebars  = Advert::where('position' , 'right_sidebar')->active()->get();

        return view('livewire.home.pages.listings.index', compact(
            'countries',
            'breeds',
            'listings',
            'breedersMap',
            'countries',
            'listingItems',
            'left_sidebars',
            'right_sidebars'
         )
        )->extends('layouts.home');
    }
}
