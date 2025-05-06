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
            'role' => 'admin',
        ]);
    
        User::factory()->create([
            'name' => 'Marco Magán',
            'email' => 'marco@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
    }
}
