<x-app-layout title="Gestión de Usuarios - Mama2s Gym">
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Gestión de Usuarios</h1>
                    <p class="text-gray-600 mt-2">Administra los roles de los usuarios del sistema</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-md font-semibold transition-colors">
                    ← Volver al Panel
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($users->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol Actual</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cambiar Rol</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($users as $user)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                                <div class="text-sm text-gray-500">ID: {{ $user->id }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($user->role)
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                        @if($user->role->slug === 'admin') bg-red-100 text-red-800
                                                        @elseif($user->role->slug === 'recepcionista') bg-blue-100 text-blue-800
                                                        @else bg-green-100 text-green-800
                                                        @endif">
                                                        {{ $user->role->name }}
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        Sin rol
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form method="POST" action="{{ route('users.update-role', $user) }}" class="inline-flex items-center gap-2">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="role_id" class="rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 text-sm">
                                                        <option value="">Selecciona un rol</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                                {{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md text-sm font-semibold transition-colors">
                                                        Cambiar
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @if($user->role)
                                                    @if($user->role->slug === 'admin')
                                                        <span class="text-red-600">Administrador</span>
                                                    @elseif($user->role->slug === 'recepcionista')
                                                        <span class="text-blue-600">Recepcionista</span>
                                                    @else
                                                        <span class="text-green-600">Cliente</span>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg">No hay usuarios registrados en el sistema.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

