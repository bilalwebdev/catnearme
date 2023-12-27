<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederPlan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plan_free = Plan::create([
            'title'     => '3 Listings',
            'name'      => '3_listing',
            'price_stripe' => 'price_1NkNDuFJl3kFwAtVuuGgQAn8',
            'price'     => 0,
            'period'    => 'one_time'
        ]);

        $plan_free->feature()->create([
            'title'     => '3 Listings',
            'name'      => '3_listing',
            'days_long' => 15,
            'limit'     => 3
        ]);

       $plan_10 =  Plan::create([
            'title' => '10 Listings',
            'name'  => '10_listing',
            'price' => 15,
            'price_stripe' => 'price_1Ng457FJl3kFwAtVbXfEecLw',
            'period' => 'monthly'
        ]);

        $plan_10->feature()->create([
            'title'     => '10 Listings',
            'name'      => '10_listings_limit',
            'days_long' => 30,
            'limit'     => 10
        ]);

        $plan_20 = Plan::create([
            'title' => '20 Listings',
            'name'  => '20_listing',
            'price' => 120,
            'price_stripe' => 'price_1Ng45oFJl3kFwAtVKdeCk0xM',
            'period' => 'yearly'
        ]);

        $plan_20->feature()->create([
            'title'     => '20 Listings',
            'name'      => '20_listings_limit',
            'days_long' => 60,
            'limit'     => 20
        ]);
    }
}
