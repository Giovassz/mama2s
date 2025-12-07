<x-app-layout title="Panel de Administración - Mama2s Gym">

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Panel de Administración</h1>
                <p class="text-gray-600 mt-2">Gestiona todos los aspectos del gimnasio</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Usuarios</h3>
                    <p class="text-3xl font-bold text-orange-500">150</p>
                    <p class="text-sm text-gray-600 mt-2">Total de miembros</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Membresías</h3>
                    <p class="text-3xl font-bold text-orange-500">120</p>
                    <p class="text-sm text-gray-600 mt-2">Activas</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Ingresos</h3>
                    <p class="text-3xl font-bold text-orange-500">$5,890</p>
                    <p class="text-sm text-gray-600 mt-2">Este mes</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Equipos</h3>
                    <p class="text-3xl font-bold text-orange-500">45</p>
                    <p class="text-sm text-gray-600 mt-2">Disponibles</p>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Acciones Rápidas</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('clientes.index') }}" class="block p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 transition-colors">
                        <h3 class="font-semibold text-gray-900 mb-2">Gestionar Clientes</h3>
                        <p class="text-sm text-gray-600">Administrar clientes y sus membresías</p>
                    </a>
                    <a href="{{ route('membresias.index') }}" class="block p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 transition-colors">
                        <h3 class="font-semibold text-gray-900 mb-2">Gestionar Membresías</h3>
                        <p class="text-sm text-gray-600">Ver y editar planes</p>
                    </a>
                    <a href="{{ route('promociones.index') }}" class="block p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 transition-colors">
                        <h3 class="font-semibold text-gray-900 mb-2">Gestionar Promociones</h3>
                        <p class="text-sm text-gray-600">Crear y administrar ofertas</p>
                    </a>
                    <a href="#" class="block p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 transition-colors">
                        <h3 class="font-semibold text-gray-900 mb-2">Reportes</h3>
                        <p class="text-sm text-gray-600">Ver estadísticas y reportes</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

