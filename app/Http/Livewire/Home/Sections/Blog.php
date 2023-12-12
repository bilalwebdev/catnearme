<?php

namespace App\Http\Livewire\Home\Sections;

use App\Repositories\BlogRepository;
use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        $blogs = (new BlogRepository)->getAllLimit();

        return view('livewire.home.sections.blog', compact('blogs') );
    }
}
