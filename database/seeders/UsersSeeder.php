<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() > 0) {
            return;
        }

        User::factory()->create([
            'apellido' => 'Admin',
            'nombre' => 'Admin',
            'documento' => '12345678',
            'email' => 'admin@admin.com',
            'password' => Hash::make('111'),
            'es_admininstrador' => true,
        ]);

        User::factory()->create([
            'apellido' => 'Publisher',
            'nombre' => 'Publisher',
            'documento' => '123456789',
            'email' => 'test@publisher.com',
            'password' => Hash::make('111'),
            'es_publicador' => true,
            'es_admininstrador' => false,
        ]);

        User::factory(8)->create();

    }
}
