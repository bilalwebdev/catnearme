<?php

namespace App\Http\Livewire\Home\Checkout;

use Livewire\Component;

class Success extends Component
{
    public function render()
    {
        return view('livewire.home.checkout.success')->extends('layouts.home');
    }
}
