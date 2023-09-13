<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(TemasSeeder::class);
        $this->call(DispositivosTableSeeder::class);
        $this->call(PublicacionesSeeder::class);



        User::factory()->create([
            'apellido' => 'Admin',
            'nombre' => 'Admin',
            'documento' => '12345678',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);

        $this->call(TemasSeeder::class);
        $this->call(DispositivosTableSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
