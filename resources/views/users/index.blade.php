<x-app-layout title="Gestión de Usuarios - Mama2s Gym">
    <div class="py-12 bg-[#0B0B0B] min-h-screen fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 slide-up">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Gestión de Usuarios</h1>
                    <p class="text-[#B0B0B0] text-lg">Administra los roles de los usuarios del sistema</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="btn-secondary inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Volver al Panel
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

            @if(session('error'))
                <div class="card border-2 border-[#EF4444]/50 bg-[#EF4444]/10 mb-6 slide-up">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-[#EF4444] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-[#EF4444] font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <div class="card slide-up" style="animation-delay: 0.1s">
                @if($users->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#2A2A2A]">
                            <thead class="bg-[#0B0B0B]">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Usuario</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Rol Actual</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Cambiar Rol</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-[#B0B0B0] uppercase tracking-wider">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1E1E1E] divide-y divide-[#2A2A2A]">
                                @foreach($users as $user)
                                    <tr class="hover:bg-[#2A2A2A] transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-white">{{ $user->name }}</div>
                                            <div class="text-sm text-[#888888]">ID: {{ $user->id }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-[#B0B0B0]">{{ $user->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($user->role)
                                                @if($user->role->slug === 'admin')
                                                    <span class="badge-dark bg-[#EF4444]/20 border border-[#EF4444]/50 text-[#EF4444]">
                                                        {{ $user->role->name }}
                                                    </span>
                                                @elseif($user->role->slug === 'recepcionista')
                                                    <span class="badge-dark bg-[#3B82F6]/20 border border-[#3B82F6]/50 text-[#3B82F6]">
                                                        {{ $user->role->name }}
                                                    </span>
                                                @else
                                                    <span class="badge-dark bg-[#10B981]/20 border border-[#10B981]/50 text-[#10B981]">
                                                        {{ $user->role->name }}
                                                    </span>
                                                @endif
                                            @else
                                                <span class="badge-dark">
                                                    Sin rol
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form method="POST" action="{{ route('users.update-role', $user) }}" class="inline-flex items-center gap-3">
                                                @csrf
                                                @method('PATCH')
                                                <select name="role_id" class="input-field text-sm py-2">
                                                    <option value="">Selecciona un rol</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn-primary text-sm px-4 py-2 whitespace-nowrap">
                                                    Cambiar
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($user->role)
                                                @if($user->role->slug === 'admin')
                                                    <span class="text-[#EF4444] font-medium">Administrador</span>
                                                @elseif($user->role->slug === 'recepcionista')
                                                    <span class="text-[#3B82F6] font-medium">Recepcionista</span>
                                                @else
                                                    <span class="text-[#10B981] font-medium">Cliente</span>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-16">
                        <svg class="w-16 h-16 text-[#888888] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <p class="text-[#B0B0B0] text-lg">No hay usuarios registrados en el sistema.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
