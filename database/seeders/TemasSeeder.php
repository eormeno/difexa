<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Tema::count() > 0) {
            return;
        }

        $temas = [
            [
                'titulo' => 'Departamento de informática',
                'slug' => 'depto-informatica',
                'descripcion' => 'Temas relacionados con el departamento de informática'
            ],
            [
                'titulo' => 'Departamento de matemáticas',
                'slug' => 'depto-matematicas',
                'descripcion' => 'Temas relacionados con el departamento de matemáticas'
            ],
            [
                'titulo' => fake()->text(50),
                'slug' => fake()->slug(),
                'descripcion' => fake()->sentence(10)
            ]
        ];

        foreach ($temas as $tema) {
            Tema::create($tema);
        }
    }
}
