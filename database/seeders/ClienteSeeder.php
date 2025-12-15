<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Membresia;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener usuarios con rol cliente que no tienen perfil de cliente
        $usuariosCliente = User::whereHas('role', function($query) {
            $query->where('slug', 'cliente');
        })->whereDoesntHave('cliente')->get();

        // Obtener membresías disponibles
        $membresias = Membresia::all();
        
        foreach ($usuariosCliente as $index => $usuario) {
            // Dividir el nombre del usuario para obtener nombre y apellido
            $nombreCompleto = explode(' ', $usuario->name);
            $nombre = $nombreCompleto[0] ?? 'Cliente';
            
            // Si el nombre tiene dos palabras, usar la segunda como apellido
            // Si no, generar un apellido basado en el índice
            if (count($nombreCompleto) > 1) {
                $apellido = $nombreCompleto[1];
            } else {
                // Generar apellidos ficticios basados en el índice
                $apellidos = ['García', 'Rodríguez', 'López', 'Martínez', 'González', 'Pérez', 'Sánchez', 'Ramírez'];
                $apellido = $apellidos[$index % count($apellidos)];
            }
            
            // Asignar membresía de forma rotativa (la primera membresía al primero, etc.)
            $membresia = $membresias->count() > 0 ? $membresias[$index % $membresias->count()] : null;

            Cliente::create([
                'user_id' => $usuario->id,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $usuario->email,
                'telefono' => '555-' . str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT),
                'fecha_registro' => Carbon::now()->subDays(rand(1, 30)),
                'activo' => true,
                'membresia_id' => $membresia ? $membresia->id : null,
                'direccion' => 'Dirección ' . ($index + 1) . ', Ciudad',
                'fecha_nacimiento' => Carbon::now()->subYears(rand(18, 65))->subDays(rand(1, 365)),
                'genero' => ['M', 'F', 'Otro'][rand(0, 2)],
            ]);
        }
    }
}

