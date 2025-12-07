<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Promocion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'promociones';

    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo_descuento',
        'descuento_porcentaje',
        'monto_descuento',
        'fecha_inicio',
        'fecha_fin',
        'activo',
        'membresia_id',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'activo' => 'boolean',
        'descuento_porcentaje' => 'decimal:2',
        'monto_descuento' => 'decimal:2',
    ];

    /**
     * Get the membresia that owns the promocion.
     */
    public function membresia(): BelongsTo
    {
        return $this->belongsTo(Membresia::class);
    }

    /**
     * Scope para obtener solo promociones activas
     */
    public function scopeActivas($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Scope para obtener promociones vigentes (dentro del rango de fechas)
     */
    public function scopeVigentes($query)
    {
        $hoy = Carbon::today();
        return $query->where('activo', true)
            ->where('fecha_inicio', '<=', $hoy)
            ->where('fecha_fin', '>=', $hoy);
    }

    /**
     * Verificar si la promoción está vigente
     */
    public function estaVigente(): bool
    {
        if (!$this->activo) {
            return false;
        }

        $hoy = Carbon::today();
        return $hoy->between($this->fecha_inicio, $this->fecha_fin);
    }

    /**
     * Obtener el descuento formateado
     */
    public function getDescuentoFormateadoAttribute(): string
    {
        if ($this->tipo_descuento === 'porcentaje') {
            return number_format($this->descuento_porcentaje, 0) . '%';
        }
        return '$' . number_format($this->monto_descuento, 2);
    }

    /**
     * Obtener el precio con descuento aplicado (si tiene membresía asociada)
     */
    public function getPrecioConDescuentoAttribute(): ?float
    {
        if (!$this->membresia) {
            return null;
        }

        $precioOriginal = $this->membresia->precio;

        if ($this->tipo_descuento === 'porcentaje') {
            $descuento = ($precioOriginal * $this->descuento_porcentaje) / 100;
            return $precioOriginal - $descuento;
        }

        return max(0, $precioOriginal - $this->monto_descuento);
    }
}
