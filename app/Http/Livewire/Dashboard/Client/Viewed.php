<?php

namespace App\Http\Livewire\Dashboard\Client;

use Livewire\Component;

class Viewed extends Component
{
    public function render()
    {
        $vieweds = auth()->user()->vieweds()->orderByDesc('created_at')->paginate(10);

        return view('livewire.dashboard.client.viewed.index', compact('vieweds'))->extends('layouts.dashboard');
    }
}
