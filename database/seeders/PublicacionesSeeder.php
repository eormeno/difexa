<?php

namespace Database\Seeders;

use App\Models\Publicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicacionesSeeder extends Seeder {
    public function run(): void {
        if (Publicacion::count() > 0) {
            return;
        }
        Publicacion::factory()->count(100)->create();
    }
}
