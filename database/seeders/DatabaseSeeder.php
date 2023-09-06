<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TemasSeeder;
use Database\Seeders\DispositivosTableSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'apellido' => 'Admin',
            'nombre' => 'Admin',
            'documento' => '00000000',
            'email' => 'admin@admin',
            'password'=>Hash::make('12345678'),
            'is_admin' => true,
        ]);
        $this->call([TemasSeeder::class]);
        $this->call([DispositivosTableSeeder::class]);
    }
}
