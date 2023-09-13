<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TemasSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\DispositivosTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([  /** Creamos un usuario fictisio cuando se ejecute el seeder */
            'apellido' => 'Admin',
            'nombre' => 'Admin',
            'documento' => '12345678',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);


        $this->call(TemasSeeder::class);
        $this->call(DispositivosTableSeeder::class); /** Agregamos esto, como elimine el archivo ahora lo tengo */
    }
}

/* Borre este archivo sin querer */