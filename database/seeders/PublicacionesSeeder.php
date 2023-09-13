<?php

namespace Database\Seeders;

use App\Models\Publicacion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Publicacion::count() > 0) {
            return;
        }

        Publicacion::factory()->count(100)->create();
    }
}
