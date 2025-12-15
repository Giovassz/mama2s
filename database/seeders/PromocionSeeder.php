<?php

namespace Database\Seeders;

use App\Models\Promocion;
use App\Models\Membresia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PromocionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener membresías para asociar promociones
        $planBasico = Membresia::where('nombre', 'Plan Básico')->first();
        $planPremium = Membresia::where('nombre', 'Plan Premium')->first();
        $planVIP = Membresia::where('nombre', 'Plan VIP')->first();

        $promociones = [
            [
                'titulo' => 'Descuento de Bienvenida',
                'descripcion' => 'Oferta especial para nuevos miembros. Ahorra en tu primera membresía con un 20% de descuento.',
                'tipo_descuento' => 'porcentaje',
                'descuento_porcentaje' => 20.00,
                'monto_descuento' => null,
                'fecha_inicio' => Carbon::now()->subDays(5),
                'fecha_fin' => Carbon::now()->addDays(25),
                'activo' => true,
                'membresia_id' => null, // Aplica a todas las membresías
            ],
            [
                'titulo' => 'Plan Premium con 30% OFF',
                'descripcion' => 'Oferta exclusiva para el Plan Premium. Incluye entrenador personal y clases grupales con un descuento especial.',
                'tipo_descuento' => 'porcentaje',
                'descuento_porcentaje' => 30.00,
                'monto_descuento' => null,
                'fecha_inicio' => Carbon::now()->subDays(10),
                'fecha_fin' => Carbon::now()->addDays(20),
                'activo' => true,
                'membresia_id' => $planPremium ? $planPremium->id : null,
            ],
            [
                'titulo' => 'Plan VIP - Descuento Especial',
                'descripcion' => 'Obtén el Plan VIP con un descuento del 25% y acceso ilimitado a todas las instalaciones y servicios premium.',
                'tipo_descuento' => 'porcentaje',
                'descuento_porcentaje' => 25.00,
                'monto_descuento' => null,
                'fecha_inicio' => Carbon::now()->subDays(3),
                'fecha_fin' => Carbon::now()->addDays(30),
                'activo' => true,
                'membresia_id' => $planVIP ? $planVIP->id : null,
            ],
        ];

        foreach ($promociones as $promocion) {
            Promocion::create($promocion);
        }
    }
}
