<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\For_;
use PhpParser\Node\Stmt\Foreach_;

class TemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ( !Tema::count() > 0) {
            $temas = [
                [
                    'slug' => 'dpto-informatica',
                    'titulo' => 'Departamento de Informática',
                    'descripcion' => 'Temas relacionados con el departamento de informática'
                ],
                [
                    'slug' => 'dpto-matematica',
                    'titulo' => 'Departamento de Matemática',
                    'descripcion' => 'Temas relacionados con el departamento de matemática'
                ],
                [
                    'slug' => fake()->slug(),
                    'titulo' => fake()->text(50),
                    'descripcion' => fake()->sentence(20)
                ]
            ];
    
            foreach ($temas as $tema) {
                  Tema::create($tema);  
            };

        }
        else{
            return;
        };
        
    }
}
