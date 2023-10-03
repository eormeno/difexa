<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tema>
 */
class TemaFactory extends Factory
{
    public function definition(): array {
        $titulo = $this->faker->sentence(3);
        $slug = Str::slug($titulo);
        return [
            'titulo' => $titulo,
            'slug' => $slug,
            'descripcion' => $this->faker->sentence(5),
        ];
    }
}
