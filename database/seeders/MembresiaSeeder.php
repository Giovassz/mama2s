<?php

namespace Database\Seeders;

use App\Models\Membresia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $membresias = [
            [
                'nombre' => 'Plan Básico',
                'descripcion' => 'Perfecto para comenzar tu transformación. Acceso completo a todas las instalaciones.',
                'precio' => 29.00,
                'duracion_dias' => 30,
                'activo' => true,
                'caracteristicas' => [
                    'Acceso a todas las áreas del gimnasio',
                    'Sin límite de visitas',
                    'App móvil incluida',
                    'Horarios flexibles',
                ],
                'sesiones_entrenador' => 0,
                'acceso_clases_grupales' => false,
                'acceso_zona_vip' => false,
                'plan_nutricional' => false,
                'orden' => 1,
            ],
            [
                'nombre' => 'Plan Premium',
                'descripcion' => 'La opción más popular. Incluye entrenador personal y clases grupales.',
                'precio' => 49.00,
                'duracion_dias' => 30,
                'activo' => true,
                'caracteristicas' => [
                    'Todo del Plan Básico',
                    '2 sesiones con entrenador personal al mes',
                    'Acceso a clases grupales ilimitadas',
                    'Plan nutricional básico incluido',
                ],
                'sesiones_entrenador' => 2,
                'acceso_clases_grupales' => true,
                'acceso_zona_vip' => false,
                'plan_nutricional' => true,
                'orden' => 2,
            ],
            [
                'nombre' => 'Plan VIP',
                'descripcion' => 'La experiencia completa. Entrenador personal ilimitado y acceso a zona exclusiva.',
                'precio' => 79.00,
                'duracion_dias' => 30,
                'activo' => true,
                'caracteristicas' => [
                    'Todo del Plan Premium',
                    'Entrenador personal ilimitado',
                    'Acceso a zona VIP exclusiva',
                    'Plan nutricional personalizado',
                    'Consultas nutricionales ilimitadas',
                ],
                'sesiones_entrenador' => 999, // Ilimitado
                'acceso_clases_grupales' => true,
                'acceso_zona_vip' => true,
                'plan_nutricional' => true,
                'orden' => 3,
            ],
        ];

        foreach ($membresias as $membresia) {
            Membresia::create($membresia);
        }
    }
}
