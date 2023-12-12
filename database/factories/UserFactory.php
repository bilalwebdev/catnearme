<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'username' => fake()->userName(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'about_me' => fake()->text('300'),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make(123), // password
            'remember_token' => Str::random(10),
            'type' => 'breeder',
            'is_verify' => mt_rand(0,1)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function country(): static
    {
        return $this->state(fn (array $attributes) => [
            'country_id' => Country::all()->random()->id,
        ]);
    }

    public function plan(): static
    {
        return $this->state(fn (array $attributes) => [
            'plan_id' => Plan::all()->random()->id,
        ]);
    }

    public function geo(): static
    {
        return $this->state(fn (array $attributes) => [

            'lat' => $this->faker->latitude(
                $min = (Country::find($attributes['country_id'])->lat * 10 - rand(0, 50)) / 10,
                $max = (Country::find($attributes['country_id'])->lat * 10 + rand(0, 50)) / 10
            ),
            'lng' => $this->faker->latitude(
                $min = (Country::find($attributes['country_id'])->lng * 10 - rand(0, 50)) / 10,
                $max = (Country::find($attributes['country_id'])->lng * 10 + rand(0, 50)) / 10
            ),
        ]);
    }
}
