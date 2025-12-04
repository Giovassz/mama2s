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

        // Admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@mama2s.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        // Recepcionista
        User::create([
            'name' => 'Recepcionista',
            'email' => 'recepcionista@mama2s.com',
            'password' => Hash::make('password'),
            'role_id' => $recepcionistaRole->id,
        ]);

        // Cliente
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@mama2s.com',
            'password' => Hash::make('password'),
            'role_id' => $clienteRole->id,
        ]);
    }
}
