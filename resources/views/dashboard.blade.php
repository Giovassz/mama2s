<x-app-layout title="Dashboard - Mama2s Gym">
    <div class="py-12 bg-[#0B0B0B] min-h-screen fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10 slide-up">
                <h1 class="text-4xl font-bold text-white mb-3">Dashboard</h1>
                <div class="flex items-center gap-4">
                    <p class="text-[#B0B0B0] text-lg">Bienvenido, <span class="text-white font-semibold">{{ Auth::user()->name }}</span></p>
                    @if(Auth::user()->role)
                        <span class="badge-gold">
                            {{ Auth::user()->role->name }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card de bienvenida -->
                <div class="card slide-up" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-white mb-2">Estado de Cuenta</h3>
                            @if(Auth::user()->isCliente() && Auth::user()->cliente)
                                @if(Auth::user()->cliente->activo)
                                    <p class="text-[#B0B0B0]">Tu cuenta está activa</p>
                                @else
                                    <p class="text-red-400 font-semibold">Tu cuenta está inactiva</p>
                                @endif
                            @else
                                <p class="text-[#B0B0B0]">Estado de cuenta</p>
                            @endif
                        </div>
                        @if(Auth::user()->isCliente() && Auth::user()->cliente)
                            @if(Auth::user()->cliente->activo)
                                <div class="bg-[#10B981]/20 rounded-xl p-3">
                                    <svg class="w-8 h-8 text-[#10B981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="bg-red-500/20 rounded-xl p-3">
                                    <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            @endif
                        @else
                            <div class="bg-[#10B981]/20 rounded-xl p-3">
                                <svg class="w-8 h-8 text-[#10B981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Card de estadísticas -->
                <div class="card slide-up" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-white mb-2">Visitas este mes</h3>
                            <p class="text-4xl font-bold text-[#FFC107]">12</p>
                        </div>
                        <div class="bg-[#FFC107]/20 rounded-xl p-3">
                            <svg class="w-8 h-8 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Card de acciones rápidas -->
                <div class="card slide-up" style="animation-delay: 0.3s">
                    <h3 class="text-lg font-bold text-white mb-4">Acciones Rápidas</h3>
                    <div class="space-y-3">
                        <a href="{{ route('profile.edit') }}" class="flex items-center text-[#FFC107] hover:text-[#FFB703] transition-colors group">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Editar Perfil
                            <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="{{ route('membresias') }}" class="flex items-center text-[#FFC107] hover:text-[#FFB703] transition-colors group">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Ver Planes
                            <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contenido según rol -->
            @if(Auth::user()->isAdmin())
                <div class="card border-2 border-[#FFC107]/30 bg-gradient-to-r from-[#FFC107]/10 to-[#FFB703]/10 slide-up" style="animation-delay: 0.4s">
                    <h2 class="text-2xl font-bold text-white mb-4">Panel de Administración</h2>
                    <p class="text-[#B0B0B0] mb-6">Tienes acceso completo al sistema de administración.</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn-primary inline-flex items-center">
                        Ir al Panel Admin
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            @elseif(Auth::user()->isRecepcionista())
                <div class="card border-2 border-[#3B82F6]/30 bg-gradient-to-r from-[#3B82F6]/10 to-[#3B82F6]/5 slide-up" style="animation-delay: 0.4s">
                    <h2 class="text-2xl font-bold text-white mb-4">Panel de Recepcionista</h2>
                    <p class="text-[#B0B0B0] mb-6">Gestiona las operaciones del gimnasio desde aquí.</p>
                    <a href="{{ route('recepcionista.dashboard') }}" class="btn-primary inline-flex items-center">
                        Ir al Panel Recepcionista
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            @elseif(Auth::user()->isCliente())
                <div class="card border-2 border-[#10B981]/30 bg-gradient-to-r from-[#10B981]/10 to-[#10B981]/5 slide-up" style="animation-delay: 0.4s">
                    <h2 class="text-2xl font-bold text-white mb-4">Mi Perfil de Cliente</h2>
                    <p class="text-[#B0B0B0] mb-6">Gestiona tu membresía y consulta tu información.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('clientes.mi-perfil') }}" class="btn-primary inline-flex items-center justify-center">
                            Ver Mi Perfil Completo
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="{{ route('membresias') }}" class="btn-secondary inline-flex items-center justify-center">
                            Ver Planes Disponibles
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
