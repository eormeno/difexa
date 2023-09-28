<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void {
        if (User::count() > 0) {
            return;
        }
        User::factory()->create([
            'apellido' => 'Admin',
            'nombre' => 'Admin',
            'documento' => '12345678',
            'email' => 'admin@admin.com',
            'password' => Hash::make('111'),
            'is_admin' => true,
            'is_publisher' => true,
        ]);

        User::factory()->create([
            'apellido' => 'Publisher',
            'nombre' => 'Publisher',
            'documento' => '12345678',
            'email' => 'publisher@publisher.com',
            'password' => Hash::make('111'),
            'is_publisher' => true,
        ]);

        User::factory(8)->create();
    }
}
