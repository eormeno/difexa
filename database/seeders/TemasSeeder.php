<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Seeder;

class TemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Tema::count() == 0) {
            Tema::factory()->create([
                'id' => 1,
                'titulo'=> 'Departamento de informática',
                'slug'=> 'depto-informatica',
                'descripcion' => 'Temas del departamento de informática',
                ]
            );
            Tema::factory()->create([
                'id' => 2,
                'titulo'=> 'Departamento de física',
                'slug'=> 'depto-fisica',
                'descripcion' => 'Temas del departamento de física',
                ]
            );
            Tema::factory()->create([
                'id' => 3,
                'titulo'=> 'Departamento de química',
                'slug'=> 'depto-quimica',
                'descripcion' => 'Temas del departamento de química',
                ]
            );

            Tema::factory()->count(97)->create();
        }

    }
}
