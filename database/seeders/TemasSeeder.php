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
        // Check if table is empty
        if (Tema::count() > 0) {
            return;
        }

        $temas = [
            [
                'id' => 1,
                'titulo' => 'Tema 1',
                'slug' => 'tema_1',
                'descripcion' => 'Descripción del tema 1'
            ]
            // Add more themes as needed
        ];

        foreach ($temas as $tema) {
            Tema::create($tema);
        }
    }
}