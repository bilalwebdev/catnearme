<?php

namespace App\Http\Livewire\Dashboard\Client;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.client.index')->extends('layouts.dashboard');
    }
}
