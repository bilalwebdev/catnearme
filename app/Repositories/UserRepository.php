<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserRepository extends Repository
{
    public $modelName = User::class;

    const TYPE_BREEDER = 'breeder';
    const TYPE_CLIENT = 'client';

    public function createAccount(array $fields, $type)
    {
        $fields = collect($fields)->merge([
            'password' => Hash::make($fields['password']),
            'type'     => $type,
            'plan_id'  => 1
        ]);

        $user = $this->model->create($fields->toArray());

        (new ConversationRepository)->notificationChat($user, config('cat.chatMessage.' . $type));

        return $user;
    }

    /**
     * @return array|mixed
     */

    public function getGeo()
    {
        $response = Http::get('http://ip-api.com/json/' . request()->ip());

        return $response->json();
    }

    /**
     * @param $address
     * @return array|mixed
     */

    public function getAddressInfo($address = '')
    {
        $response = Http::get('http://api.positionstack.com/v1/forward' , [
            'access_key' => 'f96705b4b006162270a7b045b31e9bfd',
            'query'      => $address,
            'limit'      => 1
        ]);

        return $response->json();
    }

    /**
     * @return void
     */

    public function cancel() : void
    {
        auth()->user()->subscriptions()->active()->each(function ($item) {
            $item->cancelNow();
        });

        $ids = auth()->user()->pets()->orderByDesc('created_at')->skip(3)->take(10000)->pluck('id');

        Pet::whereIn('id', $ids)->delete();

        auth()->user()->update(['plan_id' => 1]);

        (new ConversationRepository)->notificationChat(auth()->user() , __('Your subscription has been canceled, you can make a new subscription'));
    }

    /**
     * @param Plan $plan
     * @param string|null $promocode
     * @return void
     */

    public function switchPlan(Plan $plan, ?string $promocode) : void
    {
        if ($plan->name !== '3_listing') {

            auth()->user()->subscriptions()->active()->each(function ($item) {
                $item->cancelNow();
            });
            
            auth()->user()
                ->newSubscription($plan->name, $plan->price_stripe)
                ->withCoupon($promocode)
                ->trialDays(1)
                ->create();
        }

        (new PetRepository)->deletePetsPlan();

        if(! auth()->user()->document) {
            (new ConversationRepository)
                ->notificationChat(auth()->user() , config('cat.chatMessage.uploadMessageDoc'));
        }

        (new ConversationRepository)->notificationChat(auth()->user() , __('Your plan has been changed') . ' ' . $plan->title);

        auth()->user()->update(['plan_id' => $plan->id]);
    }
}
