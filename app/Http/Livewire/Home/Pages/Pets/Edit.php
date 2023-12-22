<?php

namespace App\Http\Livewire\Home\Pages\Pets;

use App\Models\Pet;
use App\Repositories\BreedRepository;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads, SEOTools;

    //   protected $listeners = ['updateForm' => 'render'];

    public Pet $pet;

    public $photo;
    public $photos;

    public $shipping = [];
    public $vactinations = [];
    public $certifications = [];

    protected function messages()
    {
        return [
            'pet.title.required' => __('The title cannot be empty'),
            'pet.age.required' => __('The age cannot be empty'),
            'pet.age.max' => __('The age cannot be greater than 100.'),

            'pet.color.required' => __('The color cannot be empty'),
            'pet.breed_id.required' => __('The breed must be chosen'),
            'pet.gender.required' => __('The gender must be chosen'),
            'pet.cb.required' => __('The Champion Bloodlines must be chosen'),

            'pet.description.max'   => __('The text exceeds the number of characters, :max is acceptable'),

            'pet.price.required' => __('The price cannot be empty'),
            'pet.price.numeric' => __('The price should be a number'),
            'pet.price.max' => __('The price cannot be greater than 1000000.'),
            'pet.price_breeding.required' => __('The price breeding cannot be empty'),
            'pet.price_breeding.numeric' => __('The price breeding should be a number'),
            'pet.price_breeding.max' => __('The breeding price cannot be greater than 1000000.'),

            'shipping.shipping_price.required' => ('The shipping price cannot be empty'),
            'shipping.shipping_price.numeric'  => ('The shipping price should be a number'),
            'shipping.shipping_price.min' => ('The minimum shipping price must not be less than :min'),
            'shipping.shipping_price.between' => ('The shipping cost should be between 10 - 100 000'),
        ];
    }


    protected $listeners = ['reset' => '$refresh'];

    public function updatedShippingShippingFee($val)
    {
        if ($val == true) {
            $this->shipping['shipping_price'] = 100;
            $this->shipping['shipping_destination'] = false;
        } else {
            $this->shipping['shipping_destination'] = true;
        }
    }

    public function updatedShippingShippingDestination($val)
    {
        if ($val == true) {
            $this->shipping['shipping_fee'] = false;
            $this->shipping['shipping_price'] = 0;
        } else {
            $this->shipping['shipping_price'] = 100;
            $this->shipping['shipping_fee'] = true;
        }
    }

    public $gender = [
        ['title' => 'Male', 'name' => 'male'],
        ['title' => 'Female', 'name' => 'female']
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

    public $breed = [];

    protected $rules = [
        'pet.title'    => ['required'],
        'pet.breed_id'    => ['required'],
        'pet.age'      => ['required'],
        'pet.gender'   => ['required'],
        'pet.color'    => ['required'],
        'pet.keywords' => ['required'],
        'pet.pt'       => ['required'],
        'pet.price'    => ['required', 'numeric'],
        'pet.price_breeding'    => ['required', 'numeric'],
        'pet.cb' => ['nullable'],
        'pet.pedigree' => ['nullable'],
        'pet.ns' => ['nullable'],
        'pet.description' => ['nullable', 'string', 'max:2000'],

        'shipping.shipping_fee'         => ['nullable'],
        'shipping.shipping_price'       => ['nullable'],
        'shipping.shipping_destination' => ['nullable'],

        'vactinations.fnv' => 'nullable',
        'vactinations.fcv' => 'nullable',
        'vactinations.fpv' => 'nullable',
        'vactinations.rabies' => 'nullable',
        'vactinations.felv' => 'nullable',
        'vactinations.chlamydia' => 'nullable',

        'certifications.tica' => 'nullable',
        'certifications.acfa' => 'nullable',
        'certifications.ccc_nsw' => 'nullable',
        'certifications.cfa' => 'nullable',
        'certifications.gccf' => 'nullable',
        'certifications.wcf' => 'nullable'
    ];

    public function mount()
    {
        $this->breed = (new BreedRepository)->model->get();

        $this->shipping       = $this->pet?->shipping?->toArray();
        $this->vactinations   = $this->pet?->vactinations?->toArray();
        $this->certifications = $this->pet?->certifications?->toArray();
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
        $this->pet->addMediaFromStream($photo->get())
            ->usingFileName($photo->getClientOriginalName())
            ->toMediaCollection('photo');
        $this->emit('reset');
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
        // $this->pet->clearMediaCollection('photos');

        foreach ($photos as $photo) {
            $this->pet->addMediaFromStream($photo->get())
                ->usingFileName($photo->getClientOriginalName())
                ->toMediaCollection('photos');
        }
        $this->emit('reset');

        $this->dispatchBrowserEvent('reInitGallery');
    }

    public function deleteImg($id)
    {

        $this->pet->deleteMedia($id);
        $this->dispatchBrowserEvent('toast-success', ['message' =>  __('Photo deleted!')]);
        $this->emit('reset');
    }

    public function save()
    {
        // Drop action if the user is not the owner
        if ($this->pet->user_id !== Auth::id()) {
            return redirect()->route('home');
        }

        $this->pet->update($this->pet->toArray());

        if (!is_null($this->shipping)) {

            if (!empty($this->shipping['shipping_fee'])) {
                $this->validate([
                    'shipping.shipping_price' => ['required', 'numeric', 'min:10', 'between:10,100000']
                ]);
            }

            $this->pet->shipping()->updateOrCreate(['pet_id' => $this->pet->id], $this->shipping);
        }

        if (!is_null($this->vactinations)) {

            $this->pet->vactinations()->updateOrCreate(['pet_id' => $this->pet->id], $this->vactinations);
        }

        if (!is_null($this->certifications)) {
            $this->pet->certifications()->updateOrCreate(['pet_id' => $this->pet->id], $this->certifications);
        }

        return redirect()->route('dashboard.listing');
    }

    public function render()
    {
        $this->seo()->setTitle(__('Edit kitten') . ' ' . $this->pet->title);

        return view('livewire.home.pages.pets.edit')->extends('layouts.home');
    }
}
