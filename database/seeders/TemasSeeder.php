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
       if(Tema::count() !== 0) {
        return;
       }
       
       $temas = [
            [
                'titulo' => 'Tema 1',
                'slug' => 'tema_1',
                'descripcion' => 'Descripción del tema 1'
            ],
            [
                'titulo' => 'Tema 2',
                'slug' => 'tema_2',
                'descripcion' => 'Descripción del tema 2'
            ]
            // Add more themes as needed
        ];

        foreach ($temas as &$tema) {
            Tema::create($tema);
        }
    }
}
