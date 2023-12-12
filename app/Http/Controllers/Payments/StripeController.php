<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use App\Repositories\ConversationRepository;
use Illuminate\Http\Request;
use Laravel\Cashier\Events\WebhookReceived;

class StripeController extends Controller
{
    public function handle(Request $request)
    {
        $type  = $request->post('type');

        $data  = $request->post('data')['object'];

        if ($type == 'invoice.payment_succeeded') {

            $plan    = Plan::where('price_stripe', $data['lines']['data'][0]['plan']['id'])->first();

            $user    = User::where('email', $data['customer_email'])->first();

            (new ConversationRepository)->notificationChat($user , config('cat.chatMessage.uploadMessageDoc'));

            $user->update(['plan_id' => $plan->id]);
        }
    }
}
