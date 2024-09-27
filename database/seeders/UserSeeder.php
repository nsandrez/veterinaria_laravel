<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Veterinario',
            'email' => 'veterinario@example.com',
            'password' => Hash::make('123'),
            'rol' => 'Veterinario',
            'estado' => 'OPERATIVO',
            'telefono' => '123456789'
        ]);

        User::create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'rol' => 'Test',
            'estado' => 'OPERATIVO',
            'telefono' => '987654321'
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
            'rol' => 'Administrador',
            'estado' => 'OPERATIVO',
            'telefono' => '123123123'
        ]);
    }
}
