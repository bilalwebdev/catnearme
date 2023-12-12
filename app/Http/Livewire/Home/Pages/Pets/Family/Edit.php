<?php

namespace App\Http\Livewire\Home\Pages\Pets\Family;

use App\Models\Family;
use App\Repositories\BreedRepository;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads, SEOTools;

    public Family $family;

    public $breed = [];

    public $photo;
    public $photos;

    public $gender = [
        ['title' => 'Male', 'name' => 'male'],
        ['title' => 'Female', 'name' => 'female']
    ];

    protected $rules = [
        'family.name'       => ['required'],
        'family.breed_id'   => ['required'],
        'family.gender'     => ['required'],
        'family.type'       => ['required'],
        'family.who'        => ['required'],
        'family.health'     => ['nullable'],
        'family.achievements_certificates'   => ['nullable'],
    ];

    public $roles = [
        ['title' => 'Parent', 'name' => 'parent'],
        ['title' => 'Sibling', 'name' => 'sibling'],
        ['title' => 'Grandparents', 'name' => 'grandparents'],
    ];

    public $whoes = [
        ['title' => 'Father', 'name' => 'father'],
        ['title' => 'Mother', 'name' => 'mother'],
        ['title' => 'Brother', 'name' => 'brother'],
        ['title' => 'Sister', 'name' => 'sister'],
    ];

    public function mount()
    {
        $this->breed = (new BreedRepository)->model->get();
    }

    /**
     * Uload Once Photo
     * @param $photo
     * @return void
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */

    public function updatedPhoto($photo)
    {
        $this->family->addMediaFromStream($photo->get())
            ->usingFileName($photo->getClientOriginalName())
            ->toMediaCollection('photo');
    }

    /**
     * Upload Gallery Photos
     * @param $photos
     * @return void
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */

    public function updatedPhotos($photos)
    {
        $this->family->clearMediaCollection('photos');

        foreach ($photos as $photo) {
            $this->family->addMediaFromStream($photo->get())
                ->usingFileName($photo->getClientOriginalName())
                ->toMediaCollection('photos');
        }
    }

    public function save()
    {

        $this->family->update();
    }

    public function render()
    {
        $this->seo()->setTitle(__('Add a pet') . ' ' . $this->family->name);

        return view('livewire.home.pages.pets.family.edit')->extends('layouts.home');
    }
}
