<x-app-layout title="Panel de Recepcionista - Mama2s Gym">
    <div class="py-12 bg-[#0B0B0B] min-h-screen fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10 slide-up">
                <h1 class="text-4xl font-bold text-white mb-3">Panel de Recepcionista</h1>
                <p class="text-[#B0B0B0] text-lg">Gestiona las operaciones diarias del gimnasio</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="card slide-up" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-2">Visitas Hoy</h3>
                            <p class="text-4xl font-bold text-[#FFC107]">42</p>
                            <p class="text-sm text-[#B0B0B0] mt-2">Miembros activos</p>
                        </div>
                        <div class="bg-[#FFC107]/20 rounded-xl p-3">
                            <svg class="w-8 h-8 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="card slide-up" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-2">Nuevos Registros</h3>
                            <p class="text-4xl font-bold text-[#FFC107]">5</p>
                            <p class="text-sm text-[#B0B0B0] mt-2">Este mes</p>
                        </div>
                        <div class="bg-[#10B981]/20 rounded-xl p-3">
                            <svg class="w-8 h-8 text-[#10B981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="card slide-up" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-2">Pendientes</h3>
                            <p class="text-4xl font-bold text-[#FFC107]">3</p>
                            <p class="text-sm text-[#B0B0B0] mt-2">Renovaciones</p>
                        </div>
                        <div class="bg-[#F59E0B]/20 rounded-xl p-3">
                            <svg class="w-8 h-8 text-[#F59E0B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card slide-up" style="animation-delay: 0.4s">
                <h2 class="text-2xl font-bold text-white mb-6">Acciones Rápidas</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <a href="{{ route('clientes.index') }}" class="card-hover border-2 border-[#2A2A2A] hover:border-[#FFC107]/30 group">
                        <div class="flex items-center mb-3">
                            <div class="bg-[#FFC107]/20 rounded-lg p-2 mr-3 group-hover:bg-[#FFC107]/30 transition-colors">
                                <svg class="w-6 h-6 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-white">Gestionar Clientes</h3>
                        </div>
                        <p class="text-sm text-[#B0B0B0]">Ver, crear y editar clientes</p>
                    </a>
                    <a href="{{ route('membresias.index') }}" class="card-hover border-2 border-[#2A2A2A] hover:border-[#FFC107]/30 group">
                        <div class="flex items-center mb-3">
                            <div class="bg-[#FFC107]/20 rounded-lg p-2 mr-3 group-hover:bg-[#FFC107]/30 transition-colors">
                                <svg class="w-6 h-6 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-white">Gestionar Membresías</h3>
                        </div>
                        <p class="text-sm text-[#B0B0B0]">Ver y editar planes disponibles</p>
                    </a>
                    <a href="{{ route('promociones.index') }}" class="card-hover border-2 border-[#2A2A2A] hover:border-[#FFC107]/30 group">
                        <div class="flex items-center mb-3">
                            <div class="bg-[#FFC107]/20 rounded-lg p-2 mr-3 group-hover:bg-[#FFC107]/30 transition-colors">
                                <svg class="w-6 h-6 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-white">Ver Promociones</h3>
                        </div>
                        <p class="text-sm text-[#B0B0B0]">Consultar ofertas activas</p>
                    </a>
                </div>
                
                <h2 class="text-2xl font-bold text-white mb-6">Tareas del Día</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-[#0B0B0B] rounded-xl border border-[#2A2A2A] hover:border-[#FFC107]/30 transition-colors">
                        <div class="flex items-center">
                            <div class="bg-[#FFC107]/20 rounded-lg p-2 mr-4">
                                <svg class="w-5 h-5 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Revisar renovaciones pendientes</h3>
                                <p class="text-sm text-[#B0B0B0]">3 membresías por renovar</p>
                            </div>
                        </div>
                        <a href="#" class="text-[#FFC107] hover:text-[#FFB703] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
