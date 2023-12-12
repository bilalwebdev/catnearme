<?php

namespace App\Http\Livewire\Home\Pages\Pets;

use App\Repositories\BreedRepository;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use SEOTools, WithFileUploads;

    public $pet = [];

    public $photo = [];
    public $photos = [];

    public $shipping = [];
    public $vactinations = [];
    public $certifications = [];

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

    public function mount()
    {
        $this->breed = (new BreedRepository)->model->get();
    }

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
            'shipping.shipping_price.between' => ('The shipping cost should be between 10 - 100000'),
        ];
    }


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

    /**
     * Save the data about new pet from frontend form
     *
     * @return bool|\Livewire\Redirector
     */
    public function addPet()
    {
        $listingsCount = auth()->user()->pets->count();

        if ($listingsCount >= auth()->user()->plan->feature->limit) {
            $this->dispatchBrowserEvent('toast-error' , ['type' => 'error' , 'message' => __('Unfortunately we can\'t create your new ad because you have exceeded the limit, please upgrade your data plan') ]);
            return false;
        }

        $validation = $this->validate([

            'pet.title' => 'required|string',
            'pet.age' => 'required|numeric|max:100',
            'pet.color' => 'required|string',
            'pet.breed_id' => 'required',
            'pet.gender' => 'required',
            'pet.keywords' => 'nullable',
            'pet.pt' => 'nullable',
            'pet.price' => 'required|numeric|max:1000000',
            'pet.price_breeding' => 'required|numeric|max:1000000',
            'pet.description' => ['nullable' , 'string', 'max:2000'],

            'pet.cb' => 'nullable',
            'pet.pedigree' => 'nullable',
            'pet.ns' => 'nullable',

            'shipping.shipping_fee' => 'nullable',
            'shipping.shipping_price' => 'nullable',
            'shipping.shipping_destination' => 'nullable',

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
            'certifications.wcf' => 'nullable',
        ]);

        $daysLong = now()->addDays(auth()->user()->plan->feature->days_long);

        $petPrepare = collect($validation['pet'])->merge(['expired_at' => $daysLong])->toArray();

        $pet = auth()->user()->pets()->create($petPrepare);

        if (isset($this->photo) && count($this->photo) > 0) {
            $pet->addMediaFromStream($this->photo[0]->get())
                ->usingFileName($this->photo[0]->getClientOriginalName())
                ->toMediaCollection('photo');
        }

        if (isset($this->photos) && count($this->photos) > 0) {
            foreach ($this->photos as $photo) {
                $pet->addMediaFromStream($photo->get())
                    ->usingFileName($photo->getClientOriginalName())
                    ->toMediaCollection('photos');
            }
        }

        // relations options

        if (! empty($this->shipping['shipping_fee'])) {
            $this->validate([
                'shipping.shipping_price' => ['required' , 'numeric' , 'min:10', 'between:10,100000']
            ]);
            $this->shipping['shipping_destination'] = false;
        } else {
            $this->shipping['shipping_fee'] = false;
            $this->shipping['shipping_destination'] = true;
            $this->shipping['shipping_price'] = 0;
        }

        $pet->shipping()->create($this->shipping);
        $pet->vactinations()->create($this->vactinations);
        $pet->certifications()->create($this->certifications);

        return redirect()->route('dashboard.listing');

    }


    public function render()
    {
        $this->seo()->setTitle(__('Add a pet'));

        return view('livewire.home.pages.pets.add')->extends('layouts.home');
    }
}
