<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMembresiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isRecepcionista());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $membresiaId = $this->route('membresia')->id;

        return [
            'nombre' => ['required', 'string', 'max:255', 'unique:membresias,nombre,' . $membresiaId],
            'descripcion' => ['nullable', 'string', 'max:1000'],
            'precio' => ['required', 'numeric', 'min:0', 'max:999999.99'],
            'duracion_dias' => ['required', 'integer', 'min:1', 'max:3650'],
            'activo' => ['sometimes', 'boolean'],
            'caracteristicas' => ['nullable', 'array'],
            'caracteristicas.*' => ['string', 'max:255'],
            'sesiones_entrenador' => ['required', 'integer', 'min:0'],
            'acceso_clases_grupales' => ['sometimes', 'boolean'],
            'acceso_zona_vip' => ['sometimes', 'boolean'],
            'plan_nutricional' => ['sometimes', 'boolean'],
            'orden' => ['nullable', 'integer', 'min:0'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la membresía es obligatorio.',
            'nombre.unique' => 'Ya existe una membresía con este nombre.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'precio.min' => 'El precio no puede ser negativo.',
            'duracion_dias.required' => 'La duración en días es obligatoria.',
            'duracion_dias.integer' => 'La duración debe ser un número entero.',
            'duracion_dias.min' => 'La duración debe ser al menos 1 día.',
            'sesiones_entrenador.required' => 'El número de sesiones con entrenador es obligatorio.',
            'sesiones_entrenador.integer' => 'El número de sesiones debe ser un número entero.',
            'sesiones_entrenador.min' => 'El número de sesiones no puede ser negativo.',
        ];
    }
}
