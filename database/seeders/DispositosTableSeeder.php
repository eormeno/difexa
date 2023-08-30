<?php

namespace Database\Seeders;

use App\Models\Dispositivo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DispositosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!app()->isLocal()) {
            exit('This seed is only for local environments.' . PHP_EOL);
        }

        if (Dispositivo::count() > 0) {
            exit('Table is not empty, therefore NOT seeding' . PHP_EOL);
        }
        
        Dispositivo::factory()->count(20)->create();
    }
}