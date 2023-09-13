<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\For_;
use PhpParser\Node\Stmt\Foreach_;

class TemasSeeder extends Seeder {
    public function run(): void {
        if (Tema::count() > 0) {
            return;
        }
        Tema::factory()->create([
            'id'            => 1,
            'titulo'        => 'Departamento de informática',
            'slug'          => 'depto-informatica',
            'descripcion'   => 'Temas del departamento de informática'
        ]);
        Tema::factory()->create([
            'id'            => 2,
            'titulo'        => 'Departamento de física',
            'slug'          => 'depto-fisica',
            'descripcion'   => 'Temas del departamento de física'
        ]);
        Tema::factory()->create([
            'id'            => 3,
            'titulo'        => 'Departamento de química',
            'slug'          => 'depto-quimica',
            'descripcion'   => 'Temas del departamento de química'
        ]);
        Tema::factory()->count(97)->create();
    }
}