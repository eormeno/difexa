<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TemasSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\DispositivosTableSeeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call(UsersSeeder::class);
        $this->call(TemasSeeder::class);
        $this->call(DispositivosTableSeeder::class);
        $this->call(PublicacionesSeeder::class);
    }
}

/* Borre este archivo sin querer */