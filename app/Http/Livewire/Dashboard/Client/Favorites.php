<?php

namespace App\Http\Livewire\Dashboard\Client;

use Livewire\Component;

class Favorites extends Component
{
    public function render()
    {
        $favorites = auth()->user()->favorites()->orderByDesc('created_at')->paginate(10);

        return view('livewire.dashboard.client.favorites.index', compact('favorites'))->extends('layouts.dashboard');
    }
}
