<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tema>
 */
class TemaFactory extends Factory {
    public function definition(): array {
        $titulo = $this->faker->word();
        $slug = Str::slug($titulo);
        return [
            'titulo' => $titulo,
            'slug' => $slug,
            'descripcion' => $this->faker->paragraph(),
        ];
    }
}
