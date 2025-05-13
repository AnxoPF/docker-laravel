<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cita;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin Taller',
            'email' => 'taller@example.com',
            'password' => bcrypt('password'),
            'role' => 'taller',
        ]);
    
        User::factory()->create([
            'name' => 'Cliente Prueba',
            'email' => 'cliente@example.com',
            'password' => bcrypt('password'),
            'role' => 'cliente',
        ]);

        $cliente1 = User::factory()->create([
            'name' => 'Anxo Pacheco',
            'email' => 'anxo@example.com',
            'password' => bcrypt('password'),
            'role' => 'cliente',
        ]);

        $cliente2 = User::factory()->create([
            'name' => 'Marcos Fernández',
            'email' => 'marcos@example.com',
            'password' => bcrypt('password'),
            'role' => 'cliente',
        ]);

        Cita::create([
            'cliente_id' => $cliente1->id,
            'marca' => 'Seat',
            'modelo' => 'Ibiza',
            'matricula' => '3009 BHT',
            'fecha' => null, 
            'hora' => null,
            'duracion' => null,
        ]);

        Cita::create([
            'cliente_id' => $cliente1->id,
            'marca' => 'Renault',
            'modelo' => 'Clio',
            'matricula' => '8142 NPL',
            'fecha' => now()->addDays(14)->format('Y:m:d'), 
            'hora' => now()->addDays(14)->format('H:i:s'),
            'duracion' => '3',
        ]);

        Cita::create([
            'cliente_id' => $cliente2->id,
            'marca' => 'Ford',
            'modelo' => 'Fiesta',
            'matricula' => '4231TGB',
            'fecha' => null, 
            'hora' => null,
            'duracion' => null,
        ]);

    }
}
