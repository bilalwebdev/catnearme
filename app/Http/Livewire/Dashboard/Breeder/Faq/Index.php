<?php

namespace App\Http\Livewire\Dashboard\Breeder\Faq;

use App\Models\Faq;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Index extends Component
{
    use SEOTools;

    public bool $is_create = true;
    public bool $is_edit = false;

    public $faq;

    public function save()
    {
        $validated = $this->validate([
            'faq.name' => ['required'],
            'faq.text' => ['required'],
        ]);

        $name = $validated['faq']['name'];

        auth()->user()->faqs()->updateOrCreate(['name' => $name], $validated['faq']);

        $this->reset('faq' , 'is_create' , 'is_edit');
    }

    /**
     * @param Faq $faq
     * @return void
     */

    public function delete(Faq $faq)
    {
        $faq->delete();
    }

    public function edit(Faq $faq)
    {
        $this->is_edit = true;

        $this->faq = $faq->attributesToArray();

    }

    public function render()
    {
        $faqs = auth()->user()->faqs()->paginate(5);

        $this->seo()->setTitle('FAQ');

        return view('livewire.dashboard.breeder.faq.index', compact('faqs'))->extends('layouts.dashboard');
    }
}
