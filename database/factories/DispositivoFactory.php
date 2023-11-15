<?php

namespace Database\Factories;

use App\Models\Dispositivo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dispositivo>
 */
class DispositivoFactory extends Factory
{
    protected $model = Dispositivo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->text,
            'codigo' => $this->faker->unique()->regexify('[A-Z]{5}')
        ];
    }
}
