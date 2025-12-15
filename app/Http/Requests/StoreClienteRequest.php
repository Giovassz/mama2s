<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClienteRequest extends FormRequest
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
            'user_id' => [
                'nullable',
                'exists:users,id',
                Rule::unique('clientes', 'user_id'),
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $user = \App\Models\User::find($value);
                        if ($user && $user->role && $user->role->slug !== 'cliente') {
                            $fail('El usuario seleccionado no tiene rol de cliente.');
                        }
                    }
                },
            ],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:clientes,email',
                function ($attribute, $value, $fail) {
                    // Si no hay user_id, verificar que el email no esté registrado como usuario
                    if (!$this->input('user_id')) {
                        if (\App\Models\User::where('email', $value)->exists()) {
                            $fail('Este email ya está registrado como usuario. Por favor seleccione el usuario de la lista.');
                        }
                    }
                },
            ],
            'telefono' => ['nullable', 'string', 'max:20'],
            'fecha_registro' => ['required', 'date', 'before_or_equal:today'],
            'membresia_id' => ['nullable', 'exists:membresias,id'],
            'direccion' => ['nullable', 'string', 'max:500'],
            'fecha_nacimiento' => ['nullable', 'date', 'before:today'],
            'genero' => ['nullable', 'in:M,F,Otro'],
            'activo' => ['sometimes', 'boolean'],
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
            'user_id.exists' => 'El usuario seleccionado no existe.',
            'user_id.unique' => 'Este usuario ya tiene un perfil de cliente.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe tener un formato válido.',
            'email.unique' => 'Este email ya está registrado.',
            'fecha_registro.required' => 'La fecha de registro es obligatoria.',
            'fecha_registro.date' => 'La fecha de registro debe ser una fecha válida.',
            'fecha_registro.before_or_equal' => 'La fecha de registro no puede ser futura.',
            'membresia_id.exists' => 'La membresía seleccionada no existe.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento no puede ser hoy o futura.',
            'genero.in' => 'El género debe ser M, F u Otro.',
        ];
    }
}
