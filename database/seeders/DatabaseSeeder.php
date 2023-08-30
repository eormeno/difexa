<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TemasTableSeeder;
use Database\Seeders\DispositosTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TemasTableSeeder::class);
        $this->call(DispositosTableSeeder::class);
    }
}