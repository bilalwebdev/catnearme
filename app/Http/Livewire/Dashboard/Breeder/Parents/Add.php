<?php

namespace App\Http\Livewire\Dashboard\Breeder\Parents;

use App\Repositories\BreedRepository;
use App\Repositories\FamilyRepository;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $photo;

    public $family = [
        'breed_id' => 1,
        'gender'   => 'male',
        'color'    => 'black',
        'type'     => 'parent',
        'who'      => 'father'
    ];

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

    public function add()
    {

        $validated = $this->validate([
            'photo'                 => ['nullable' , 'mimes:jpeg,png,jpg,gif'],
            'family.name'           => ['required'],
            'family.breed_id'       => ['required'],
            'family.sire'           => ['nullable'],
            'family.age'            => ['required'],
            'family.color'          => ['required'],
            'family.size'           => ['required'],
            'family.awards'         => ['required'],
            'family.type'           => ['required'],
            'family.description'    => ['nullable'],
            'family.health'         => ['nullable']
        ]);


        $parent = collect($validated['family'])->merge([
            'user_id' => auth()->id()
        ])->toArray();

        $family = (new FamilyRepository)->store($parent);

        if ($validated['photo']) {
            $family->addMediaFromStream($validated['photo']->get())
                ->usingFileName($validated['photo']->getClientOriginalName())
                ->toMediaCollection('photo');
        }

        return redirect()->route('dashboard.parents');

    }

    public function render()
    {
        $breeds = (new BreedRepository)->model->get();

        return view('livewire.dashboard.breeder.parents.add', compact('breeds'))->extends('layouts.dashboard');
    }
}
