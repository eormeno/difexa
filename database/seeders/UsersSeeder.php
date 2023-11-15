<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        if (User::count()>0)
        {
            return;
        }
        User::factory()->create([
            'apellido' => 'Admin',
            'nombre' => 'Admin',
            'documento' => '12345678',
            'email' => 'admin@admin.com',
            'password' => Hash::make('111'),
            'is_admin' => true,
            'mensaje' => 'Usted es administrados',
        ]);

        User::factory()->create([
            'apellido' => 'Test',
            'nombre' => 'Admin',
            'documento' => '12345678',
            'email' => 'test@publisher.com',
            'password' => Hash::make('111'),
            'is_admin' => false,
            'is_publisher' =>true,
            'mensaje'=> 'Usted no es publicador aun',
        ]);

        User::factory(7)->create();
    }
}
