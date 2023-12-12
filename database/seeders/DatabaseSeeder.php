<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pet;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(100)->country()->geo()->plan()->create();

        Pet::factory(1000)->user()->breeder()->create();

        $this->call(SeederPlan::class);
        $this->call(SeederCategory::class);

        //$this->call(SeederBreed::class);
        $this->call(SeederUser::class);
    }
}
