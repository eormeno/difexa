<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Tema::count() > 0) {
            return;
        }

        Tema::factory()->count(20)->create();
    }
}