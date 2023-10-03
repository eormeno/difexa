<?php

namespace Database\Factories;

use App\Models\Tema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;


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
        $randomTema = Tema::all()->random();
        return [
            'apellido' => $this->faker->lastName(),
            'nombre' => $this->faker->firstName(),
            'documento' => $this->faker->numberBetween(10000000,99999999),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'tema_id' => $randomTema -> id,
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
