<x-app-layout title="Gestión de Promociones - Mama2s Gym">
    <div class="py-12 bg-[#0B0B0B] min-h-screen fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 slide-up">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Gestión de Promociones</h1>
                    <p class="text-[#B0B0B0] text-lg">Administra las promociones y ofertas del gimnasio</p>
                </div>
                <a href="{{ route('promociones.create') }}" class="btn-primary inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Nueva Promoción
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
                @if($promociones->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#2A2A2A]">
                            <thead class="bg-[#0B0B0B]">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Título</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Descuento</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Membresía</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Vigencia</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1E1E1E] divide-y divide-[#2A2A2A]">
                                @foreach($promociones as $promocion)
                                    <tr class="hover:bg-[#2A2A2A] transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-semibold text-white">{{ $promocion->titulo }}</div>
                                            @if($promocion->descripcion)
                                                <div class="text-sm text-[#B0B0B0] mt-1">{{ Str::limit($promocion->descripcion, 50) }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-lg font-bold text-[#FFC107]">
                                                {{ $promocion->descuento_formateado }}
                                            </div>
                                            @if($promocion->membresia && $promocion->precio_con_descuento)
                                                <div class="text-xs text-[#B0B0B0] mt-1">
                                                    Precio: ${{ number_format($promocion->precio_con_descuento, 2) }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($promocion->membresia)
                                                <div class="text-sm text-white">{{ $promocion->membresia->nombre }}</div>
                                            @else
                                                <div class="text-sm text-[#888888]">Todas las membresías</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-white">
                                                {{ $promocion->fecha_inicio->format('d/m/Y') }}
                                            </div>
                                            <div class="text-xs text-[#B0B0B0]">
                                                hasta {{ $promocion->fecha_fin->format('d/m/Y') }}
                                            </div>
                                            @if($promocion->estaVigente())
                                                <span class="inline-block mt-1 badge-dark bg-[#10B981]/20 border border-[#10B981]/50 text-[#10B981]">
                                                    Vigente
                                                </span>
                                            @elseif($promocion->fecha_fin < now())
                                                <span class="inline-block mt-1 badge-dark bg-[#888888]/20 border border-[#888888]/50 text-[#888888]">
                                                    Expirada
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($promocion->activo)
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
                                                <a href="{{ route('promociones.edit', $promocion) }}" class="text-[#FFC107] hover:text-[#FFB703] transition-colors">
                                                    Editar
                                                </a>
                                                @if($promocion->activo)
                                                    <form action="{{ route('promociones.destroy', $promocion) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-[#EF4444] hover:text-[#DC2626] transition-colors" onclick="return confirm('¿Estás seguro de desactivar esta promoción?')">
                                                            Desactivar
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('promociones.activate', $promocion) }}" method="POST" class="inline">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                        </svg>
                        <p class="text-[#B0B0B0] mb-6 text-lg">No hay promociones registradas.</p>
                        <a href="{{ route('promociones.create') }}" class="btn-primary inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Crear Primera Promoción
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
