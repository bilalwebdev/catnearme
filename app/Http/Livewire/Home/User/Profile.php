<?php

namespace App\Http\Livewire\Home\User;

use App\Models\User;
use App\Repositories\ConversationRepository;
use Artesaos\SEOTools\Traits\SEOTools;
use Digikraaft\ReviewRating\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Musonza\Chat\Facades\ChatFacade;

class Profile extends Component
{
    use WithPagination, SEOTools;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render'];

    public User $user;

    public $review;

    protected function messages()
    {
        return [
            'review.text.required' => __('The comment text cannot be empty')
        ];
    }

    public function sendMessage()
    {
        $userTo = $this->user;

        $conversation = (new ConversationRepository)->openDialog($userTo);

        return redirect()->route('dashboard.chat' , ['conversation' => $conversation->id]);

    }

    public function deleteReview(Review $review)
    {
        $review->delete();

        $this->emitSelf('render');
    }

    public function sendReview()
    {
        if ($this->user->hasReviewed(auth()->user())) {
            $this->dispatchBrowserEvent('toast-error' , ['message' =>  __('You have already left a review for this user')]);
            return false;
        }

        $validated = $this->validate([
            'review.text' => ['required' , 'string'],
            'review.rate' => ['required'],
        ]);

        $author = auth()->user();

        $this->user->review($validated['review']['text'], $author, $validated['review']['rate']);

        $this->emitSelf('render');
    }

    public function render()
    {
        $pets = $this->user->pets()->paginate(4);

        $this->seo()->setTitle(__('Profile breeder') . ' ' . $this->user->username);

        $this->user->increment('views', 1);

        return view('livewire.home.user.profile', compact('pets'))->extends('layouts.home');
    }
}
