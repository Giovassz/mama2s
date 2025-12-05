<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membresia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'duracion_dias',
        'activo',
        'caracteristicas',
        'sesiones_entrenador',
        'acceso_clases_grupales',
        'acceso_zona_vip',
        'plan_nutricional',
        'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'caracteristicas' => 'array',
        'precio' => 'decimal:2',
        'duracion_dias' => 'integer',
        'sesiones_entrenador' => 'integer',
        'acceso_clases_grupales' => 'boolean',
        'acceso_zona_vip' => 'boolean',
        'plan_nutricional' => 'boolean',
        'orden' => 'integer',
    ];

    /**
     * Scope para obtener solo membresías activas
     */
    public function scopeActivas($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Scope para ordenar por el campo orden
     */
    public function scopeOrdenadas($query)
    {
        return $query->orderBy('orden')->orderBy('precio');
    }

    /**
     * Obtener la duración formateada (ej: "30 días" o "1 mes")
     */
    public function getDuracionFormateadaAttribute()
    {
        if ($this->duracion_dias >= 30) {
            $meses = round($this->duracion_dias / 30, 1);
            return $meses == 1 ? '1 mes' : "{$meses} meses";
        }
        return "{$this->duracion_dias} días";
    }
}
