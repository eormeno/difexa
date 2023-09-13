<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Support\Str;
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
        Tema::factory()->create([
            'id' => 1,
            'titulo' => 'Departamento de informatica',
            'slug' => 'depto-informatica',
            'descripcion' => 'Temas del departamento de informatica'
        ]);
        Tema::factory()->create([
            'id' => 2,
            'titulo' => 'Departamento de fisica',
            'slug' => 'depto-fisica',
            'descripcion' => 'Temas del departamento de fisica'
        ]);
        Tema::factory()->create([
            'id' => 3,
            'titulo' => 'Departamento de quimica',
            'slug' => 'depto-quimica',
            'descripcion' => 'Temas del departamento de quimica'
        ]);
        Tema::factory()->count(97)->create();



        $temas = [];

        $temas[] = [
            'id'            => 1,
            'titulo'        => 'Departamento de informática',
            'slug'          => 'depto-informatica',
            'descripcion'   => 'Temas relacionados con el departamento de informática'
        ];

        $temas[] = [
            'id'            => 2,
            'titulo'        => 'Departamento de física',
            'slug'          => 'depto-fisica',
            'descripcion'   => 'Temas relacionados con el departamento de física'
        ];

        $temas[] = [
            'id'            => 3,
            'titulo'        => 'Departamento de química',
            'slug'          => 'depto-quimica',
            'descripcion'   => 'Temas relacionados con el departamento de química'
        ];

        for ($i = 0; $i <= 97; $i++) {
            $id = $i + 4;
            $titulo = fake()->sentence(3);
            $slug = Str::slug($titulo, '_');
            $descripcion = fake()->paragraph(3);
            $temas[] = [
                'id'            => $id,
                'titulo'        => $titulo,
                'slug'          => $slug,
                'descripcion'   => $descripcion
            ];
        }

        Tema::insert($temas);
    }
}
