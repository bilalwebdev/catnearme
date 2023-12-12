<?php

namespace App\Console\Commands\System\Pets;

use App\Models\Pet;
use App\Repositories\PetRepository;
use Illuminate\Console\Command;

class ExpiredCheck extends Command
{
    protected $signature = 'app:expired-check';

    protected $description = 'Command description';

    public function handle()
    {
        (new PetRepository)->activeList()->each(function (Pet $pet) {

            $days_long = $pet->user->plan->feature->days_long;

            if ($pet->renew >= 3 && $pet->user->can('is_plan')) {
                return $pet->update(['status' => 'not_active']);
            }

            elseif ($pet->expired_at <= now() && $pet->user->can('is_free')) {
                return $pet->update(['status' => 'not_active']);
            }

            elseif ($pet->expired_at <= now() && $pet->user->can('is_plan')) {

                $pet->update(['expired_at' => now()->addDays($days_long)]);

                return $pet->increment('renew');
            }
        });
    }
}
