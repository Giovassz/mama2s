<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Administrador', 'slug' => 'admin'],
            ['name' => 'Recepcionista', 'slug' => 'recepcionista'],
            ['name' => 'Cliente', 'slug' => 'cliente'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
