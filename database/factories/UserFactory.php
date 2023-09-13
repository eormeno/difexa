<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Tema;
use Illuminate\Support\Facades\Hash;

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
        $tema=Tema::all()->random();
        return [
            'apellido' => fake()->lastName(),
            'nombre' => fake()->firstName(),
            'documento' => fake()->unique()->numberBetween(10000000, 99999999),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'tema_id' => $tema->id,
            'password' => Hash::make('111'),
            'remember_token' => Str::random(10),
        ];
    }
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            
            'is_admin' => true,
        ]);
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
}
