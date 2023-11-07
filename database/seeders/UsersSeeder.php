<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() == 0) {
            User::factory()->create([
                'apellido' => 'Admin',
                'nombre' => 'Admin',
                'documento' => '12345678',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
                'mensaje'=> 'Usted es administrador',
            ]);
            User::factory()->create([
                'apellido' => 'User',
                'nombre' => 'Test',
                'documento' => '12345678',
                'email' => 'user@user.com',
                'password' => Hash::make('123'),
                'is_admin' => false,
                'is_publisher' => true,
                'mensaje'=> 'Usted aún no es publicador',
            ]);
            User::factory(8)->create();
        }
    }
}
