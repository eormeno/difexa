<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\TemasSeeder;
use Database\Seeders\DispositivosTableSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\PublicacionesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([TemasSeeder::class]);
        $this->call([UsersSeeder::class]);
        $this->call([DispositivosTableSeeder::class]);
        $this->call([PublicacionesSeeder::class]);
    }
}
