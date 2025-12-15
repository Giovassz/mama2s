<x-app-layout title="Mi Perfil - Mama2s Gym">
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Mi Perfil</h1>
                <p class="text-gray-600 mt-2">Información de tu cuenta y membresía</p>
            </div>

            @if(!$cliente->activo)
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-red-800">Cuenta Inactiva</h3>
                            <p class="text-red-700 mt-1">Tu cuenta está actualmente inactiva. Por favor, contacta con el administrador para reactivar tu cuenta.</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Información Personal -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Información Personal</h2>
                    </div>
                    <div class="p-6">
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Nombre Completo</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $cliente->nombre_completo }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $cliente->email }}</dd>
                            </div>
                            @if($cliente->telefono)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $cliente->telefono }}</dd>
                                </div>
                            @endif
                            @if($cliente->fecha_nacimiento)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Fecha de Nacimiento</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $cliente->fecha_nacimiento->format('d/m/Y') }}</dd>
                                </div>
                            @endif
                            @if($cliente->genero)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Género</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        @if($cliente->genero == 'M')
                                            Masculino
                                        @elseif($cliente->genero == 'F')
                                            Femenino
                                        @else
                                            Otro
                                        @endif
                                    </dd>
                                </div>
                            @endif
                            @if($cliente->direccion)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $cliente->direccion }}</dd>
                                </div>
                            @endif
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Fecha de Registro</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $cliente->fecha_registro->format('d/m/Y') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Estado de la Cuenta</dt>
                                <dd class="mt-1">
                                    @if($cliente->activo)
                                        <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            Activo
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                            Inactivo
                                        </span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Información de Membresía -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Mi Membresía</h2>
                    </div>
                    <div class="p-6">
                        @if($cliente->membresia)
                            @if(!$cliente->activo)
                                <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-3 rounded-md">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                        <p class="text-sm font-semibold text-red-800">Tu membresía está inactiva debido a que tu cuenta está inactiva.</p>
                                    </div>
                                </div>
                            @endif
                            <div class="space-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Plan</dt>
                                    <dd class="mt-1 text-lg font-semibold {{ $cliente->activo ? 'text-gray-900' : 'text-gray-500' }}">{{ $cliente->membresia->nombre }}</dd>
                                    @if(!$cliente->activo)
                                        <dd class="mt-1">
                                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                Membresía Inactiva
                                            </span>
                                        </dd>
                                    @endif
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Precio</dt>
                                    <dd class="mt-1 text-2xl font-bold text-orange-500">${{ number_format($cliente->membresia->precio, 2) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Duración</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $cliente->membresia->duracion_formateada }}</dd>
                                </div>
                                @if($cliente->membresia->descripcion)
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $cliente->membresia->descripcion }}</dd>
                                    </div>
                                @endif
                                
                                <!-- Características -->
                                @if($cliente->membresia->caracteristicas && count($cliente->membresia->caracteristicas) > 0)
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 mb-2">Características</dt>
                                        <dd class="mt-1">
                                            <ul class="list-disc list-inside space-y-1 text-sm text-gray-900">
                                                @foreach($cliente->membresia->caracteristicas as $caracteristica)
                                                    <li>{{ $caracteristica }}</li>
                                                @endforeach
                                            </ul>
                                        </dd>
                                    </div>
                                @endif

                                <!-- Beneficios adicionales -->
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 mb-2">Beneficios</dt>
                                    <dd class="mt-1 space-y-2">
                                        @if($cliente->membresia->sesiones_entrenador > 0)
                                            <div class="flex items-center text-sm text-gray-900">
                                                <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $cliente->membresia->sesiones_entrenador }} sesiones con entrenador
                                            </div>
                                        @endif
                                        @if($cliente->membresia->acceso_clases_grupales)
                                            <div class="flex items-center text-sm text-gray-900">
                                                <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                Acceso a clases grupales
                                            </div>
                                        @endif
                                        @if($cliente->membresia->acceso_zona_vip)
                                            <div class="flex items-center text-sm text-gray-900">
                                                <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                Acceso a zona VIP
                                            </div>
                                        @endif
                                        @if($cliente->membresia->plan_nutricional)
                                            <div class="flex items-center text-sm text-gray-900">
                                                <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                Plan nutricional incluido
                                            </div>
                                        @endif
                                    </dd>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Sin membresía asignada</h3>
                                <p class="mt-1 text-sm text-gray-500">No tienes una membresía activa en este momento.</p>
                                <div class="mt-6">
                                    <a href="{{ route('membresias') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-900 bg-orange-500 hover:bg-orange-600">
                                        Ver Planes Disponibles
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Acciones -->
            <div class="mt-6 flex justify-end">
                <a href="{{ route('dashboard') }}" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                    Volver al Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

