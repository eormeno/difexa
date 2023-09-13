<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dispositivo;

class DispositivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Dispositivo::count() > 0) {
            return;
        }

        Dispositivo::factory()->create([
            'id' => 1,
            'nombre' => 'Monitor sala de conferencias',
            'descripcion' => 'Este monitor es un SmartTV marca LG de 32 pulgadas, ubicado en la sala de conferencias de la empresa. Se utiliza para mostrar información de la empresa, como por ejemplo, el estado de los servidores, el estado de los servicios, etc.',
        ]);

        Dispositivo::factory(10)->create();
    }
}
