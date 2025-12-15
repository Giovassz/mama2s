<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $recepcionistaRole = Role::where('slug', 'recepcionista')->first();
        $clienteRole = Role::where('slug', 'cliente')->first();

        // Admin (solo uno, el que ya existe - no lo recreamos)
        // Si no existe, lo creamos; si ya existe, lo dejamos tal cual
        if (!User::where('email', 'admin@mama2s.com')->exists()) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@mama2s.com',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id,
            ]);
        }

        // Recepcionistas (2 usuarios) - usamos updateOrCreate para evitar duplicados
        User::updateOrCreate(
            ['email' => 'recepcionista1@mama2s.com'],
            [
                'name' => 'Recepcionista 1',
                'password' => Hash::make('password'),
                'role_id' => $recepcionistaRole->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'recepcionista2@mama2s.com'],
            [
                'name' => 'Recepcionista 2',
                'password' => Hash::make('password'),
                'role_id' => $recepcionistaRole->id,
            ]
        );

        // Clientes (2 usuarios) - usamos updateOrCreate para evitar duplicados
        User::updateOrCreate(
            ['email' => 'cliente1@mama2s.com'],
            [
                'name' => 'Cliente 1',
                'password' => Hash::make('password'),
                'role_id' => $clienteRole->id,
            ]
        );

        User::updateOrCreate(
            ['email' => 'cliente2@mama2s.com'],
            [
                'name' => 'Cliente 2',
                'password' => Hash::make('password'),
                'role_id' => $clienteRole->id,
            ]
        );
    }
}
