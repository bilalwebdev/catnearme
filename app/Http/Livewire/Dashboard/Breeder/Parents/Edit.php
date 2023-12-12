<?php

namespace App\Http\Livewire\Dashboard\Breeder\Parents;

use App\Models\Family;
use App\Repositories\BreedRepository;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    protected $listeners = ['updatePetEditForm' => '$refresh'];

    public Family $family;

    public $photo;
    public $photos;

    public $gender = [
        ['title' => 'Male', 'name' => 'male'],
        ['title' => 'Female', 'name' => 'female']
    ];

    public $whoes = [
        ['title' => 'Father', 'name' => 'father'],
        ['title' => 'Mother', 'name' => 'mother']
    ];

    public $roles = [
        ['title' => 'Parent', 'name' => 'parent']
    ];

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

    public function messages()
    {
        return [
            'family.name'   => __('The Name field is required'),
            'family.age'    => __('The Age field is required'),
            'family.size'   => __('The Size field is required'),
            'family.awards' => __('The Awards field is required'),
        ];
    }

    protected $rules = [
        'family.name'           => ['required'],
        'family.breed_id'       => ['required'],
        'family.sire'           => ['nullable'],
        'family.who'            => ['required'],
        'family.age'            => ['required'],
        'family.color'          => ['required'],
        'family.size'           => ['required'],
        'family.awards'         => ['required'],
        'family.type'           => ['required'],
        'family.description'    => ['nullable'],
        'family.health'         => ['nullable']
    ];

    public function updatedPhoto(TemporaryUploadedFile $photo)
    {
        $this->family->addMediaFromStream($photo->get())
            ->usingFileName($photo->getClientOriginalName())
            ->toMediaCollection('photo');

        $this->emitSelf('updatePetEditForm');
    }

    public function updatedPhotos($photos)
    {
        $this->family->clearMediaCollection('photos');

        foreach ($photos as $photo) {
            $this->family->addMediaFromStream($photo->get())
                ->usingFileName($photo->getClientOriginalName())
                ->toMediaCollection('photos');
        }
    }

    public function clearPhotos()
    {
        $this->family->clearMediaCollection('photos');
    }

    public function edit()
    {
        $validated = $this->validate();

        $this->family->update($validated['family']);

        return redirect()->route('dashboard.parents');
    }


    public function render()
    {
        $breeds = (new BreedRepository)->model->get();

        return view('livewire.dashboard.breeder.parents.edit', compact('breeds'))->extends('layouts.dashboard');
    }
}
