<x-app-layout title="Mi Perfil - Mama2s Gym">

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Mi Perfil</h1>
                <p class="text-gray-600 mt-2">Gestiona tu información y membresía</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Mi Plan</h3>
                    <p class="text-2xl font-bold text-orange-500">Premium</p>
                    <p class="text-sm text-gray-600 mt-2">Vence: 15/01/2025</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Visitas este mes</h3>
                    <p class="text-3xl font-bold text-orange-500">18</p>
                    <p class="text-sm text-gray-600 mt-2">Días activos</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Próxima sesión</h3>
                    <p class="text-2xl font-bold text-orange-500">Mañana</p>
                    <p class="text-sm text-gray-600 mt-2">10:00 AM</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Información Personal</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <p class="mt-1 text-gray-900">{{ Auth::user()->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-gray-900">{{ Auth::user()->email }}</p>
                    </div>
                    <div>
                        <a href="{{ route('profile.edit') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-gray-900 px-6 py-2 rounded-md font-semibold transition-colors">
                            Editar Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

