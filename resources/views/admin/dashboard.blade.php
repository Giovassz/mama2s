<x-app-layout title="Panel de Administración - Mama2s Gym">
    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-black mb-2">
                            Panel de Administración
                        </h1>
                        <p class="text-gray-600 text-lg">Gestiona todos los aspectos del gimnasio</p>
                        <p class="text-sm text-gray-500 mt-1">Última actualización: {{ now()->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="bg-white rounded-lg shadow-md px-6 py-4">
                            <div class="text-sm text-gray-600">Bienvenido</div>
                            <div class="text-lg font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas Principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Usuarios -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-blue-500 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Total Usuarios</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalUsuarios }}</p>
                                <p class="text-xs text-gray-500 mt-1">En el sistema</p>
                            </div>
                            <div class="bg-blue-100 rounded-full p-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex space-x-4 text-xs">
                            <span class="text-gray-600">Admin: <strong class="text-red-600">{{ $usuariosAdmin }}</strong></span>
                            <span class="text-gray-600">Recepcionista: <strong class="text-blue-600">{{ $usuariosRecepcionista }}</strong></span>
                            <span class="text-gray-600">Cliente: <strong class="text-green-600">{{ $usuariosCliente }}</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Clientes Activos -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-green-500 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Clientes Activos</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $clientesActivos }}</p>
                                <p class="text-xs text-gray-500 mt-1">de {{ $totalClientes }} totales</p>
                            </div>
                            <div class="bg-green-100 rounded-full p-4">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center">
                            <span class="text-xs text-green-600 font-semibold">
                                @if($crecimientoClientes > 0)
                                    ↑ {{ abs($crecimientoClientes) }}% este mes
                                @elseif($crecimientoClientes < 0)
                                    ↓ {{ abs($crecimientoClientes) }}% este mes
                                @else
                                    Sin cambios
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Membresías Activas -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-purple-500 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Membresías</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $membresiasActivas }}</p>
                                <p class="text-xs text-gray-500 mt-1">Planes disponibles</p>
                            </div>
                            <div class="bg-purple-100 rounded-full p-4">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 text-xs text-gray-600">
                            <span>{{ $totalMembresias }} totales | </span>
                            <span class="text-green-600">{{ $membresiasActivas }} activas</span>
                        </div>
                    </div>
                </div>

                <!-- Ingresos Mensuales -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-orange-500 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">Ingresos Estimados</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">${{ number_format($ingresosMensuales, 2, '.', ',') }}</p>
                                <p class="text-xs text-gray-500 mt-1">Este mes</p>
                            </div>
                            <div class="bg-orange-100 rounded-full p-4">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 text-xs text-green-600 font-semibold">
                            Nuevos clientes: {{ $nuevosClientesEsteMes }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segunda Fila de Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Promociones -->
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-yellow-500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Promociones</h3>
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                        </svg>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total</span>
                            <span class="text-2xl font-bold text-gray-900">{{ $totalPromociones }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Activas</span>
                            <span class="text-xl font-semibold text-green-600">{{ $promocionesActivas }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Vigentes</span>
                            <span class="text-xl font-semibold text-orange-600">{{ $promocionesVigentes }}</span>
                        </div>
                    </div>
                </div>

                <!-- Distribución de Clientes -->
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-indigo-500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Distribución</h3>
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Clientes Activos</span>
                            <span class="text-xl font-semibold text-green-600">{{ $clientesActivos }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Clientes Inactivos</span>
                            <span class="text-xl font-semibold text-red-600">{{ $clientesInactivos }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Nuevos este mes</span>
                            <span class="text-xl font-semibold text-blue-600">{{ $nuevosClientesEsteMes }}</span>
                        </div>
                    </div>
                </div>

                <!-- Membresías Populares -->
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-pink-500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Membresías Populares</h3>
                        <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <div class="space-y-3">
                        @forelse($membresiasPopulares as $membresia)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 text-sm truncate">{{ $membresia->nombre }}</span>
                                <span class="text-lg font-semibold text-pink-600">{{ $membresia->clientes_count }} clientes</span>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No hay datos disponibles</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Acciones Rápidas -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Acciones Rápidas</h2>
                    <div class="h-1 w-20 bg-gradient-to-r from-orange-500 to-orange-600 rounded"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('clientes.index') }}" class="group relative bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border-2 border-blue-200 hover:border-blue-500 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-blue-500 rounded-lg p-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-blue-600 opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Gestionar Clientes</h3>
                        <p class="text-sm text-gray-600">Administrar clientes y sus membresías activas</p>
                    </a>

                    <a href="{{ route('membresias.index') }}" class="group relative bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 border-2 border-purple-200 hover:border-purple-500 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-purple-500 rounded-lg p-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-purple-600 opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Gestionar Membresías</h3>
                        <p class="text-sm text-gray-600">Ver, crear y editar planes de membresía</p>
                    </a>

                    <a href="{{ route('promociones.index') }}" class="group relative bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl p-6 border-2 border-yellow-200 hover:border-yellow-500 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-yellow-500 rounded-lg p-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-yellow-600 opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Gestionar Promociones</h3>
                        <p class="text-sm text-gray-600">Crear y administrar ofertas especiales</p>
                    </a>

                    <a href="{{ route('users.index') }}" class="group relative bg-gradient-to-br from-red-50 to-red-100 rounded-xl p-6 border-2 border-red-200 hover:border-red-500 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-red-500 rounded-lg p-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-red-600 opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Gestionar Usuarios</h3>
                        <p class="text-sm text-gray-600">Cambiar roles y permisos de usuarios</p>
                    </a>
                </div>
            </div>

            <!-- Clientes Recientes -->
            @if($clientesRecientes->count() > 0)
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Clientes Recientes</h2>
                    <a href="{{ route('clientes.index') }}" class="text-orange-600 hover:text-orange-700 font-semibold text-sm flex items-center">
                        Ver todos
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Membresía</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Registro</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($clientesRecientes as $cliente)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $cliente->nombre_completo }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $cliente->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                            {{ $cliente->membresia ? $cliente->membresia->nombre : 'Sin membresía' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $cliente->fecha_registro->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($cliente->activo)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Activo
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Inactivo
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
