<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'taller',
        ]);
    
        User::factory()->create([
            'name' => 'Cliente Prueba',
            'email' => 'cliente@example.com',
            'password' => bcrypt('password'),
            'role' => 'cliente',
        ]);
    }
}
