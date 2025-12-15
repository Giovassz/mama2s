<x-app-layout title="Gestión de Clientes - Mama2s Gym">
    <div class="py-12 bg-[#0B0B0B] min-h-screen fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 slide-up">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Gestión de Clientes</h1>
                    <p class="text-[#B0B0B0] text-lg">Administra los clientes del gimnasio</p>
                </div>
                <a href="{{ route('clientes.create') }}" class="btn-primary inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Nuevo Cliente
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
                @if($clientes->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#2A2A2A]">
                            <thead class="bg-[#0B0B0B]">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Teléfono</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Membresía</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Fecha Registro</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1E1E1E] divide-y divide-[#2A2A2A]">
                                @foreach($clientes as $cliente)
                                    <tr class="hover:bg-[#2A2A2A] transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-white">{{ $cliente->nombre_completo }}</div>
                                            @if($cliente->user)
                                                <div class="text-sm text-[#B0B0B0]">Usuario: {{ $cliente->user->name }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-[#B0B0B0]">{{ $cliente->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-[#B0B0B0]">{{ $cliente->telefono ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($cliente->membresia)
                                                <div class="text-sm font-semibold text-white">{{ $cliente->membresia->nombre }}</div>
                                                <div class="text-sm text-[#FFC107]">${{ number_format($cliente->membresia->precio, 2) }}</div>
                                            @else
                                                <span class="text-sm text-[#888888]">Sin membresía</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-[#B0B0B0]">{{ $cliente->fecha_registro->format('d/m/Y') }}</div>
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('clientes.edit', $cliente) }}" class="text-[#FFC107] hover:text-[#FFB703] transition-colors">
                                                    Editar
                                                </a>
                                                @if($cliente->activo)
                                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-[#EF4444] hover:text-[#DC2626] transition-colors" onclick="return confirm('¿Estás seguro de desactivar este cliente?')">
                                                            Desactivar
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('clientes.activate', $cliente) }}" method="POST" class="inline">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <p class="text-[#B0B0B0] mb-6 text-lg">No hay clientes registrados.</p>
                        <a href="{{ route('clientes.create') }}" class="btn-primary inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Crear Primer Cliente
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

