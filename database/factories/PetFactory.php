<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'    => $this->faker->name(),
            'age'      => mt_rand(5,20),
            'gender'   => 'male',
            'price'    => mt_rand(100, 5000),
            'price_breeding'    => mt_rand(100, 5000),
            'color'    => 'black',
        ];
    }

    public function user()
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => User::all()->random()->id,
        ]);
    }

    public function breeder()
    {
        return $this->state(fn (array $attributes) => [
            'breed_id' => Breed::all()->random()->id
        ]);
    }
}
