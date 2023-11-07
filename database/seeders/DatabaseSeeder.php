<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(TemasSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DispositosTableSeeder::class);
        $this->call(PublicacionesSeeder::class);
    }
}
