<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'fecha_registro',
        'activo',
        'membresia_id',
        'direccion',
        'fecha_nacimiento',
        'genero',
    ];

    protected $casts = [
        'fecha_registro' => 'date',
        'fecha_nacimiento' => 'date',
        'activo' => 'boolean',
    ];

    /**
     * Get the user that owns the cliente.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the membresia that owns the cliente.
     */
    public function membresia()
    {
        return $this->belongsTo(Membresia::class);
    }

    /**
     * Scope para obtener solo clientes activos
     */
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    /**
     * Get the full name attribute.
     */
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->apellido}";
    }
}
