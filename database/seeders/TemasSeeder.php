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

        
    }
}
