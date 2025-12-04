<x-app-layout title="Dashboard - Mama2s Gym">

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-gray-600 mt-2">Bienvenido, {{ Auth::user()->name }}</p>
                @if(Auth::user()->role)
                    <span class="inline-block mt-2 bg-orange-500 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ Auth::user()->role->name }}
                    </span>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card de bienvenida -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Estado de Cuenta</h3>
                    <p class="text-gray-600">Tu membresía está activa</p>
                </div>

                <!-- Card de estadísticas -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Visitas este mes</h3>
                    <p class="text-3xl font-bold text-orange-500">12</p>
                </div>

                <!-- Card de acciones rápidas -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Acciones Rápidas</h3>
                    <div class="space-y-2">
                        <a href="{{ route('profile.edit') }}" class="block text-orange-500 hover:text-orange-600">Editar Perfil</a>
                        <a href="{{ route('membresias') }}" class="block text-orange-500 hover:text-orange-600">Ver Planes</a>
                    </div>
                </div>
            </div>

            <!-- Contenido según rol -->
            @if(Auth::user()->isAdmin())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Panel de Administración</h2>
                    <p class="text-gray-600 mb-4">Tienes acceso completo al sistema de administración.</p>
                    <a href="{{ route('admin.dashboard') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-gray-900 px-6 py-2 rounded-md font-semibold transition-colors">
                        Ir al Panel Admin
                    </a>
                </div>
            @elseif(Auth::user()->isRecepcionista())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Panel de Recepcionista</h2>
                    <p class="text-gray-600 mb-4">Gestiona las operaciones del gimnasio desde aquí.</p>
                    <a href="{{ route('recepcionista.dashboard') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-gray-900 px-6 py-2 rounded-md font-semibold transition-colors">
                        Ir al Panel Recepcionista
                    </a>
                </div>
            @elseif(Auth::user()->isCliente())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Mi Perfil de Cliente</h2>
                    <p class="text-gray-600 mb-4">Gestiona tu membresía y consulta tu información.</p>
                    <a href="{{ route('cliente.dashboard') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-gray-900 px-6 py-2 rounded-md font-semibold transition-colors">
                        Ver Mi Perfil
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

