<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePromocionRequest extends FormRequest
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
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:1000'],
            'tipo_descuento' => ['required', 'string', 'in:porcentaje,monto'],
            'descuento_porcentaje' => [
                'nullable',
                'required_if:tipo_descuento,porcentaje',
                'numeric',
                'min:0',
                'max:100',
            ],
            'monto_descuento' => [
                'nullable',
                'required_if:tipo_descuento,monto',
                'numeric',
                'min:0',
            ],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'activo' => ['sometimes', 'boolean'],
            'membresia_id' => ['nullable', 'exists:membresias,id'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no debe exceder los 255 caracteres.',
            'descripcion.max' => 'La descripción no debe exceder los 1000 caracteres.',
            'tipo_descuento.required' => 'El tipo de descuento es obligatorio.',
            'tipo_descuento.in' => 'El tipo de descuento debe ser porcentaje o monto.',
            'descuento_porcentaje.required_if' => 'El porcentaje de descuento es obligatorio cuando el tipo es porcentaje.',
            'descuento_porcentaje.numeric' => 'El porcentaje de descuento debe ser un número.',
            'descuento_porcentaje.min' => 'El porcentaje de descuento no puede ser negativo.',
            'descuento_porcentaje.max' => 'El porcentaje de descuento no puede ser mayor a 100%.',
            'monto_descuento.required_if' => 'El monto de descuento es obligatorio cuando el tipo es monto.',
            'monto_descuento.numeric' => 'El monto de descuento debe ser un número.',
            'monto_descuento.min' => 'El monto de descuento no puede ser negativo.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'activo.boolean' => 'El estado activo debe ser verdadero o falso.',
            'membresia_id.exists' => 'La membresía seleccionada no es válida.',
        ];
    }
}
