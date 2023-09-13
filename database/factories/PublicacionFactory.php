<?php

namespace Database\Factories;

use App\Models\Tema;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publicacion>
 */
class PublicacionFactory extends Factory {
    public function definition(): array {
        $randomUser = User::all()->random();
        $randomTema = Tema::all()->random();
        return [
            'titulo' => $this->faker->sentence(),
            'contenido' => $this->faker->paragraph(),
            'imagen' => $this->faker->imageUrl(),
            'desde' => $this->faker->date(),
            'hasta' => $this->faker->date(),
            'user_id' => $randomUser->id,
            'tema_id' => $randomTema->id,
        ];
    }
}