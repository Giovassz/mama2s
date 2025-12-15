<x-app-layout title="Panel de Administración - Mama2s Gym">
    <div class="py-12 bg-[#0B0B0B] min-h-screen fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-10 slide-up">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h1 class="text-5xl font-bold text-white mb-3">
                            Panel de Administración
                        </h1>
                        <p class="text-[#B0B0B0] text-lg">Gestiona todos los aspectos del gimnasio</p>
                        <p class="text-sm text-[#888888] mt-2">Última actualización: {{ now()->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="hidden md:flex items-center">
                        <div class="card px-8 py-5">
                            <div class="text-sm text-[#B0B0B0] uppercase tracking-wide">Bienvenido</div>
                            <div class="text-xl font-bold text-white mt-1">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas Principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Usuarios -->
                <div class="card-hover border-l-4 border-[#3B82F6] slide-up" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider mb-2">Total Usuarios</p>
                            <p class="text-4xl font-bold text-white mb-1">{{ $totalUsuarios }}</p>
                            <p class="text-xs text-[#888888]">En el sistema</p>
                        </div>
                        <div class="bg-[#3B82F6]/20 rounded-xl p-4">
                            <svg class="w-8 h-8 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#2A2A2A] flex flex-wrap gap-3 text-xs">
                        <span class="text-[#B0B0B0]">Admin: <strong class="text-[#EF4444]">{{ $usuariosAdmin }}</strong></span>
                        <span class="text-[#B0B0B0]">Recepcionista: <strong class="text-[#3B82F6]">{{ $usuariosRecepcionista }}</strong></span>
                        <span class="text-[#B0B0B0]">Cliente: <strong class="text-[#10B981]">{{ $usuariosCliente }}</strong></span>
                    </div>
                </div>

                <!-- Clientes Activos -->
                <div class="card-hover border-l-4 border-[#10B981] slide-up" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider mb-2">Clientes Activos</p>
                            <p class="text-4xl font-bold text-white mb-1">{{ $clientesActivos }}</p>
                            <p class="text-xs text-[#888888]">de {{ $totalClientes }} totales</p>
                        </div>
                        <div class="bg-[#10B981]/20 rounded-xl p-4">
                            <svg class="w-8 h-8 text-[#10B981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#2A2A2A]">
                        <span class="text-xs text-[#10B981] font-semibold flex items-center">
                            @if($crecimientoClientes > 0)
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                </svg>
                                {{ abs($crecimientoClientes) }}% este mes
                            @elseif($crecimientoClientes < 0)
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                                {{ abs($crecimientoClientes) }}% este mes
                            @else
                                Sin cambios
                            @endif
                        </span>
                    </div>
                </div>

                <!-- Membresías Activas -->
                <div class="card-hover border-l-4 border-[#A855F7] slide-up" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider mb-2">Membresías</p>
                            <p class="text-4xl font-bold text-white mb-1">{{ $membresiasActivas }}</p>
                            <p class="text-xs text-[#888888]">Planes disponibles</p>
                        </div>
                        <div class="bg-[#A855F7]/20 rounded-xl p-4">
                            <svg class="w-8 h-8 text-[#A855F7]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#2A2A2A] text-xs">
                        <span class="text-[#B0B0B0]">{{ $totalMembresias }} totales | </span>
                        <span class="text-[#10B981] font-semibold">{{ $membresiasActivas }} activas</span>
                    </div>
                </div>

                <!-- Ingresos Mensuales -->
                <div class="card-hover border-l-4 border-[#FFC107] slide-up" style="animation-delay: 0.4s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider mb-2">Ingresos Estimados</p>
                            <p class="text-4xl font-bold text-[#FFC107] mb-1">${{ number_format($ingresosMensuales, 2, '.', ',') }}</p>
                            <p class="text-xs text-[#888888]">Este mes</p>
                        </div>
                        <div class="bg-[#FFC107]/20 rounded-xl p-4">
                            <svg class="w-8 h-8 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-[#2A2A2A]">
                        <span class="text-xs text-[#10B981] font-semibold">
                            Nuevos clientes: {{ $nuevosClientesEsteMes }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Segunda Fila de Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Promociones -->
                <div class="card border-t-4 border-[#FFC107] slide-up" style="animation-delay: 0.5s">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white">Promociones</h3>
                        <div class="bg-[#FFC107]/20 rounded-lg p-2">
                            <svg class="w-6 h-6 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-[#B0B0B0]">Total</span>
                            <span class="text-3xl font-bold text-white">{{ $totalPromociones }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[#B0B0B0]">Activas</span>
                            <span class="text-2xl font-bold text-[#10B981]">{{ $promocionesActivas }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[#B0B0B0]">Vigentes</span>
                            <span class="text-2xl font-bold text-[#FFC107]">{{ $promocionesVigentes }}</span>
                        </div>
                    </div>
                </div>

                <!-- Distribución de Clientes -->
                <div class="card border-t-4 border-[#3B82F6] slide-up" style="animation-delay: 0.6s">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white">Distribución</h3>
                        <div class="bg-[#3B82F6]/20 rounded-lg p-2">
                            <svg class="w-6 h-6 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-[#B0B0B0]">Clientes Activos</span>
                            <span class="text-2xl font-bold text-[#10B981]">{{ $clientesActivos }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[#B0B0B0]">Clientes Inactivos</span>
                            <span class="text-2xl font-bold text-[#EF4444]">{{ $clientesInactivos }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[#B0B0B0]">Nuevos este mes</span>
                            <span class="text-2xl font-bold text-[#3B82F6]">{{ $nuevosClientesEsteMes }}</span>
                        </div>
                    </div>
                </div>

                <!-- Membresías Populares -->
                <div class="card border-t-4 border-[#EC4899] slide-up" style="animation-delay: 0.7s">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-white">Membresías Populares</h3>
                        <div class="bg-[#EC4899]/20 rounded-lg p-2">
                            <svg class="w-6 h-6 text-[#EC4899]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-4">
                        @forelse($membresiasPopulares as $membresia)
                            <div class="flex justify-between items-center">
                                <span class="text-[#B0B0B0] text-sm truncate pr-2">{{ $membresia->nombre }}</span>
                                <span class="text-xl font-bold text-[#EC4899] whitespace-nowrap">{{ $membresia->clientes_count }} clientes</span>
                            </div>
                        @empty
                            <p class="text-sm text-[#888888]">No hay datos disponibles</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Acciones Rápidas -->
            <div class="card mb-8 slide-up" style="animation-delay: 0.8s">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-white">Acciones Rápidas</h2>
                    <div class="h-1 w-24 bg-gradient-to-r from-[#FFC107] to-[#FFB703] rounded-full"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="{{ route('clientes.index') }}" class="group relative card border-2 border-[#2A2A2A] hover:border-[#3B82F6] hover:shadow-xl hover:shadow-[#3B82F6]/10 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-[#3B82F6]/20 rounded-xl p-3">
                                <svg class="w-7 h-7 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-[#3B82F6] opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Gestionar Clientes</h3>
                        <p class="text-sm text-[#B0B0B0]">Administrar clientes y sus membresías activas</p>
                    </a>

                    <a href="{{ route('membresias.index') }}" class="group relative card border-2 border-[#2A2A2A] hover:border-[#A855F7] hover:shadow-xl hover:shadow-[#A855F7]/10 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-[#A855F7]/20 rounded-xl p-3">
                                <svg class="w-7 h-7 text-[#A855F7]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-[#A855F7] opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Gestionar Membresías</h3>
                        <p class="text-sm text-[#B0B0B0]">Ver, crear y editar planes de membresía</p>
                    </a>

                    <a href="{{ route('promociones.index') }}" class="group relative card border-2 border-[#2A2A2A] hover:border-[#FFC107] hover:shadow-xl hover:shadow-[#FFC107]/10 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-[#FFC107]/20 rounded-xl p-3">
                                <svg class="w-7 h-7 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-[#FFC107] opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Gestionar Promociones</h3>
                        <p class="text-sm text-[#B0B0B0]">Crear y administrar ofertas especiales</p>
                    </a>

                    <a href="{{ route('users.index') }}" class="group relative card border-2 border-[#2A2A2A] hover:border-[#EF4444] hover:shadow-xl hover:shadow-[#EF4444]/10 transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-[#EF4444]/20 rounded-xl p-3">
                                <svg class="w-7 h-7 text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <svg class="w-5 h-5 text-[#EF4444] opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Gestionar Usuarios</h3>
                        <p class="text-sm text-[#B0B0B0]">Cambiar roles y permisos de usuarios</p>
                    </a>
                </div>
            </div>

            <!-- Clientes Recientes -->
            @if($clientesRecientes->count() > 0)
            <div class="card slide-up" style="animation-delay: 0.9s">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-3xl font-bold text-white">Clientes Recientes</h2>
                    <a href="{{ route('clientes.index') }}" class="text-[#FFC107] hover:text-[#FFB703] font-semibold text-sm flex items-center group">
                        Ver todos
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#2A2A2A]">
                        <thead class="bg-[#0B0B0B]">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Cliente</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Membresía</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Fecha Registro</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#1E1E1E] divide-y divide-[#2A2A2A]">
                            @foreach($clientesRecientes as $cliente)
                                <tr class="hover:bg-[#2A2A2A] transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-white">{{ $cliente->nombre_completo }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#B0B0B0]">{{ $cliente->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="badge-dark border border-[#A855F7]/30">
                                            {{ $cliente->membresia ? $cliente->membresia->nombre : 'Sin membresía' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#B0B0B0]">
                                        {{ $cliente->fecha_registro->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($cliente->activo)
                                            <span class="badge-dark bg-[#10B981]/20 border border-[#10B981]/50 text-[#10B981]">
                                                Activo
                                            </span>
                                        @else
                                            <span class="badge-dark bg-[#EF4444]/20 border border-[#EF4444]/50 text-[#EF4444]">
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
