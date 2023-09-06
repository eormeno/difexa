<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TemasTableSeeder;
use Database\Seeders\DispositosTablesSeeder;
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
            'documento' => '12345678',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);
        $this->call(TemasTableSeeder::class);
        $this->call(DispositosTableSeeder::class);

    }
}
