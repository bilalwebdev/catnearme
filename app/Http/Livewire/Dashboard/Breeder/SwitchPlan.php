<?php

namespace App\Http\Livewire\Dashboard\Breeder;

use App\Models\Plan;
use App\Repositories\ConversationRepository;
use App\Repositories\UserRepository;
use Artesaos\SEOTools\Traits\SEOTools;
use Laravel\Cashier\Subscription;
use Livewire\Component;

class SwitchPlan extends Component
{
    use SEOTools;

    public $plan;

    public $promocode = 'trial';

    public function mount()
    {
        if (auth()->user()->can('client')) {
            return redirect()->route('dashboard');
        }
    }

    public function changePlan(Plan $plan)
    {
        (new UserRepository)->switchPlan($plan, $this->promocode);
    }

    public function cancel()
    {
        (new UserRepository)->cancel();
    }

    public function render()
    {
        $this->seo()->setTitle('Switch Plan', false);

        $plans = Plan::all();

        return view('livewire.dashboard.breeder.switch-plan', compact('plans'))->extends('layouts.dashboard');
    }
}
