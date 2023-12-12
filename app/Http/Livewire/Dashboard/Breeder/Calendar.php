<?php

namespace App\Http\Livewire\Dashboard\Breeder;

use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

use App\Models\Calendar as CalendarModel;

class Calendar extends Component
{
    use SEOTools;

    public $event = [];

    public $events = [];

    protected function messages() {
        return [
            'event.title.required' => __('Event name is not filled in'),
            'event.start.required' => __('Event start date not filled in')
        ];
    }

    public function drop($event)
    {
       $id = $event['event']['id'];

       CalendarModel::find($id)->delete();
    }

    protected $listeners = ['updateCalendar' => 'render'];

    public function mount()
    {
        $this->events = auth()->user()->calendar;
    }

    public function addEvent()
    {
        $validated = $this->validate([
            'event.title' => 'required',
            'event.start' => 'required',
            'event.end'   => 'nullable',
        ]);

        auth()->user()->calendar()->create($validated['event']);

        return redirect()->route('dashboard.calendar');
    }

    public function render()
    {
        $this->seo()->setTitle('Calendar');

        return view('livewire.dashboard.breeder.calendar')->extends('layouts.dashboard');
    }
}
