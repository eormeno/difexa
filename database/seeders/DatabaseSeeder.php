<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TemasSeeder;
use Database\Seeders\DispositivosTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TemasSeeder::class);
        $this->call(DispositivosTableSeeder::class); /** Agregamos esto, como elimine el archivo ahora lo tengo */
    }
}

/* Borre este archivo sin querer */