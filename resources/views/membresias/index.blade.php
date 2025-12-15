<x-app-layout title="Gestión de Membresías - Mama2s Gym">
    <div class="py-12 bg-[#0B0B0B] min-h-screen fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 slide-up">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Gestión de Membresías</h1>
                    <p class="text-[#B0B0B0] text-lg">Administra los planes de membresía del gimnasio</p>
                </div>
                <a href="{{ route('membresias.create') }}" class="btn-primary inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Nueva Membresía
                </a>
            </div>

            @if(session('success'))
                <div class="card border-2 border-[#10B981]/50 bg-[#10B981]/10 mb-6 slide-up">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-[#10B981] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-[#10B981] font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="card slide-up" style="animation-delay: 0.1s">
                @if($membresias->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#2A2A2A]">
                            <thead class="bg-[#0B0B0B]">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Precio</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Duración</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1E1E1E] divide-y divide-[#2A2A2A]">
                                @foreach($membresias as $membresia)
                                    <tr class="hover:bg-[#2A2A2A] transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-white">{{ $membresia->nombre }}</div>
                                            @if($membresia->descripcion)
                                                <div class="text-sm text-[#B0B0B0] mt-1">{{ Str::limit($membresia->descripcion, 50) }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-lg font-bold text-[#FFC107]">${{ number_format($membresia->precio, 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-[#B0B0B0]">{{ $membresia->duracion_formateada }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($membresia->activo)
                                                <span class="badge-dark bg-[#10B981]/20 border border-[#10B981]/50 text-[#10B981]">
                                                    Activa
                                                </span>
                                            @else
                                                <span class="badge-dark bg-[#EF4444]/20 border border-[#EF4444]/50 text-[#EF4444]">
                                                    Inactiva
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('membresias.edit', $membresia) }}" class="text-[#FFC107] hover:text-[#FFB703] transition-colors">
                                                    Editar
                                                </a>
                                                @if($membresia->activo)
                                                    <form action="{{ route('membresias.destroy', $membresia) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-[#EF4444] hover:text-[#DC2626] transition-colors" onclick="return confirm('¿Estás seguro de desactivar esta membresía?')">
                                                            Desactivar
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('membresias.activate', $membresia) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="text-[#10B981] hover:text-[#059669] transition-colors">
                                                            Activar
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-16">
                        <svg class="w-16 h-16 text-[#888888] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-[#B0B0B0] mb-6 text-lg">No hay membresías registradas.</p>
                        <a href="{{ route('membresias.create') }}" class="btn-primary inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Crear Primera Membresía
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
