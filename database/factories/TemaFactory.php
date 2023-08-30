<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tema>
 */
class TemaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = $this->faker->sentence();
        return [
            'slug' => Str::slug($titulo),
            'titulo' => $titulo,
            'descripcion' => fake()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function nuevoTema($titulo, $descripcion): static
    { 
        if (empty($descripcion)) {
            $descripcion = "Descripción de $titulo";
        }

        return $this->state(fn(array $attributes) => [
            'slug' => Str::slug($titulo),
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}