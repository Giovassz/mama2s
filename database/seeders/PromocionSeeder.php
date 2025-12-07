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
                'descripcion' => 'Oferta especial para nuevos miembros. Ahorra en tu primera membresía.',
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
                'descripcion' => 'Oferta exclusiva para el Plan Premium. Incluye entrenador personal y clases grupales.',
                'tipo_descuento' => 'porcentaje',
                'descuento_porcentaje' => 30.00,
                'monto_descuento' => null,
                'fecha_inicio' => Carbon::now()->subDays(10),
                'fecha_fin' => Carbon::now()->addDays(20),
                'activo' => true,
                'membresia_id' => $planPremium ? $planPremium->id : null,
            ],
            [
                'titulo' => 'Ahorra $15 en Plan Básico',
                'descripcion' => 'Descuento fijo en el Plan Básico. Perfecto para comenzar tu transformación.',
                'tipo_descuento' => 'monto',
                'descuento_porcentaje' => null,
                'monto_descuento' => 15.00,
                'fecha_inicio' => Carbon::now()->subDays(3),
                'fecha_fin' => Carbon::now()->addDays(27),
                'activo' => true,
                'membresia_id' => $planBasico ? $planBasico->id : null,
            ],
            [
                'titulo' => 'Black Friday - 40% OFF',
                'descripcion' => 'Oferta especial Black Friday. Aprovecha el descuento más grande del año.',
                'tipo_descuento' => 'porcentaje',
                'descuento_porcentaje' => 40.00,
                'monto_descuento' => null,
                'fecha_inicio' => Carbon::now()->addDays(10),
                'fecha_fin' => Carbon::now()->addDays(17),
                'activo' => true,
                'membresia_id' => null, // Aplica a todas las membresías
            ],
        ];

        foreach ($promociones as $promocion) {
            Promocion::create($promocion);
        }
    }
}
