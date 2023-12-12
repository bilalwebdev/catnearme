<?php

namespace App\Http\Livewire\Home\Pages\Blog;

use App\Repositories\BlogRepository;
use App\Repositories\CategoryRepository;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;
use function Symfony\Component\Translation\t;

class Detail extends Component
{
    use WithPagination, SEOTools;

    protected $paginationTheme = 'bootstrap';

    public Blog $blog;

    public $comment;

    public function messages()
    {
        return [
            'comment.message.required' => __('The text of the comment must be filled in')
        ];
    }

    public function sendComment()
    {
        $validated = $this->validate([
            'comment.message' => ['required']
        ]);

        $this->blog->comment([
            'body' => $validated['comment']['message']
        ], auth()->user());

    }

    public function render()
    {
        $categories = (new CategoryRepository)->model->get();

        $previous = (new BlogRepository)->model->where('id', '<', $this->blog->id)->first();

        $next = (new BlogRepository)->model->where('id', '>', $this->blog->id)->first();

        $relatedPosts = (new BlogRepository)->related($this->blog);

        $comments = $this->blog->comments()->paginate(4);

        $this->seo()->setTitle(__('Post details') . ' ' . $this->blog->title);

        $this->blog->increment('views');

        return view('livewire.home.pages.blog.detail', compact('categories' , 'previous' , 'next' , 'relatedPosts' , 'comments'))->extends('layouts.home');
    }
}
