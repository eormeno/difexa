<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'id' => 1,
                'titulo' => 'Departamento de Informática', 
                'slug' => 'depto-informatica',
                'descripcion' => 'Temas relacionados con el departamento de informática'
            ],
            [
                'id' => 2,
                'titulo' => 'Departamento de Matemática',
                'slug' => 'depto-matematica',
                'descripcion' =>'Temas relacionados con el departamento de matemática'
            ],
            [
                'id' => 3,
                'titulo' => fake()->sentence(3),
                'slug' => fake()->slug(),
                'descripcion' => fake()->sentence(10)
            ]
            // Add more themes as needed
        ];

        foreach ($temas as $tema) {
            Tema::create($tema);
        }
        for($i=0; $i<=97; $i++) {
            $id=$i+4;
            $titulo=fake()->sentence(3);
            $slug =Str::slug($titulo,'_');
            $descripcion=fake()->paragraph(3);
            $tema = [
                'id'        => $id,
                'titulo'    => $titulo,
                'slug'      => $slug,
                'descripcion' => $descripcion
            ];
            Tema::create($tema);
        }  
    }
}
