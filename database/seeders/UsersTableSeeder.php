<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // if root admin not exists, create it
        if (!User::where('id', 1)->exists()) {
            User::factory()->rootAdmin()->create();
        }

        User::factory()->count(10)->create();
    }
}
