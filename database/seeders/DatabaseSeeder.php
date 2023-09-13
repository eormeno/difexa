<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call(UsersSeeder::class);
        $this->call(TemasSeeder::class);
        $this->call(DispositivosSeeder::class);
        $this->call(PublicacionesSeeder::class);
    }
}
