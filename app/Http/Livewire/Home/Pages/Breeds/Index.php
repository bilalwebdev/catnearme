<?php

namespace App\Http\Livewire\Home\Pages\Breeds;

use App\Repositories\BreedRepository;
use App\Repositories\CategoryRepository;
use App\Traits\HasSeo;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, SEOTools, HasSeo;
    protected $paginationTheme = 'bootstrap';

    public $seoTag = 'breeds';

    public function render()
    {
        $this->getSeo();

        $breeds = (new BreedRepository)->model->orderByDesc('is_popular')->paginate(28);

        return view('livewire.home.pages.breeds.index', compact('breeds'))->extends('layouts.home');
    }
}
