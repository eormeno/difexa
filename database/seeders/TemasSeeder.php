<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Tema::count() > 0){
            return;
        }
        $temas = [
            [
                'titulo' => 'Departamento de Informática', 
                'slug' => 'depto-informatica',
                'descripcion' => 'Temas relacionados con el departamento de informática'
            ],
            [
                'titulo' => 'Departamento de Matemática',
                'slug' => 'depto-matematica',
                'descripcion' =>'Temas relacionados con el departamento de matemática'
            ],
            [
                'titulo' => fake()->sentence(3),
                'slug' => fake()->slug(),
                'descripcion' => fake()->sentence(10)
            ]
            // Add more themes as needed
        ];

        foreach ($temas as $tema) {
            Tema::create($tema);
        }
    }
}
