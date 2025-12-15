<x-app-layout title="Mi Perfil - Mama2s Gym">

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Mi Perfil</h1>
                <p class="text-gray-600 mt-2">Gestiona tu información y membresía</p>
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

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Mi Plan</h3>
                    @if($cliente->membresia)
                        @if($cliente->activo)
                            <p class="text-2xl font-bold text-orange-500">{{ $cliente->membresia->nombre }}</p>
                        @else
                            <p class="text-xl font-bold text-gray-400">{{ $cliente->membresia->nombre }}</p>
                            <p class="text-sm text-red-600 mt-2 font-semibold">Membresía Inactiva</p>
                        @endif
                        @if($cliente->subscription_ends_at)
                            <p class="text-sm text-gray-600 mt-2">Vence: {{ $cliente->subscription_ends_at->format('d/m/Y') }}</p>
                        @endif
                    @else
                        <p class="text-xl font-bold text-gray-400">Sin membresía</p>
                        <a href="{{ route('membresias') }}" class="text-sm text-orange-500 hover:text-orange-600 mt-2 inline-block">Ver planes disponibles</a>
                    @endif
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Estado de la Cuenta</h3>
                    @if($cliente->activo)
                        <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Activo
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            Inactivo
                        </span>
                    @endif
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Fecha de Registro</h3>
                    <p class="text-xl font-bold text-gray-700">{{ $cliente->fecha_registro->format('d/m/Y') }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Información Personal</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <p class="mt-1 text-gray-900">{{ $cliente->nombre_completo }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-gray-900">{{ $cliente->email }}</p>
                    </div>
                    @if($cliente->telefono)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <p class="mt-1 text-gray-900">{{ $cliente->telefono }}</p>
                        </div>
                    @endif
                    <div class="flex gap-4">
                        <a href="{{ route('clientes.mi-perfil') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md font-semibold transition-colors">
                            Ver Perfil Completo
                        </a>
                        <a href="{{ route('profile.edit') }}" class="inline-block border border-gray-300 hover:bg-gray-50 text-gray-700 px-6 py-2 rounded-md font-semibold transition-colors">
                            Editar Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

