<x-app-layout title="Panel de Recepcionista - Mama2s Gym">

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Panel de Recepcionista</h1>
                <p class="text-gray-600 mt-2">Gestiona las operaciones diarias del gimnasio</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Visitas Hoy</h3>
                    <p class="text-3xl font-bold text-orange-500">42</p>
                    <p class="text-sm text-gray-600 mt-2">Miembros activos</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Nuevos Registros</h3>
                    <p class="text-3xl font-bold text-orange-500">5</p>
                    <p class="text-sm text-gray-600 mt-2">Este mes</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Pendientes</h3>
                    <p class="text-3xl font-bold text-orange-500">3</p>
                    <p class="text-sm text-gray-600 mt-2">Renovaciones</p>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Acciones Rápidas</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <a href="{{ route('clientes.index') }}" class="block p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 transition-colors">
                        <h3 class="font-semibold text-gray-900 mb-2">Gestionar Clientes</h3>
                        <p class="text-sm text-gray-600">Ver, crear y editar clientes</p>
                    </a>
                    <a href="{{ route('membresias.index') }}" class="block p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 transition-colors">
                        <h3 class="font-semibold text-gray-900 mb-2">Gestionar Membresías</h3>
                        <p class="text-sm text-gray-600">Ver y editar planes disponibles</p>
                    </a>
                    <a href="{{ route('promociones.index') }}" class="block p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 transition-colors">
                        <h3 class="font-semibold text-gray-900 mb-2">Ver Promociones</h3>
                        <p class="text-sm text-gray-600">Consultar ofertas activas</p>
                    </a>
                </div>
                
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Tareas del Día</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div>
                            <h3 class="font-semibold text-gray-900">Registrar nuevo miembro</h3>
                            <p class="text-sm text-gray-600">Juan Pérez - Plan Premium</p>
                        </div>
                        <a href="{{ route('clientes.create') }}" class="bg-orange-500 hover:bg-orange-600 text-gray-900 px-4 py-2 rounded-md font-semibold transition-colors">
                            Registrar
                        </a>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div>
                            <h3 class="font-semibold text-gray-900">Renovar membresía</h3>
                            <p class="text-sm text-gray-600">María García - Plan Básico</p>
                        </div>
                        <a href="{{ route('clientes.index') }}" class="bg-orange-500 hover:bg-orange-600 text-gray-900 px-4 py-2 rounded-md font-semibold transition-colors">
                            Ver Clientes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

