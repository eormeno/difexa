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
        // Check if table is empty
        if (Tema::count() > 0) {
            return;
        }

        Tema::factory()->create([
            'id'            => 1,
            'titulo'        => 'Departamento de informática',
            'slug'          => 'depto-informatica',
            'descripcion'   => 'Temas relacionados con el departamento de informática'
        ]);

        Tema::factory()->create([
            'id'            => 2,
            'titulo'        => 'Departamento de fisica',
            'slug'          => 'depto-fisica',
            'descripcion'   => 'Temas relacionados con el departamento de fisica'
        ]);

        Tema::factory()->create([
            'id'            => 3,
            'titulo'        => 'Departamento de quimica',
            'slug'          => 'depto-quimica',
            'descripcion'   => 'Temas relacionados con el departamento de quimica'
        ]);

        Tema::factory()->count(97)->create();

    }
}
