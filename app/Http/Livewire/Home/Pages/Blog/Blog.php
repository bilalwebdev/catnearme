<?php

namespace App\Http\Livewire\Home\Pages\Blog;

use App\Repositories\BlogRepository;
use App\Traits\HasSeo;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Blog extends Component
{
    use SEOTools, HasSeo;

    public $seoTag = 'blog';

    public function render()
    {
        $posts = (new BlogRepository)->model->get();

        $this->getSeo();

        return view('livewire.home.pages.blog.blog' , compact('posts'))->extends('layouts.home');
    }
}
