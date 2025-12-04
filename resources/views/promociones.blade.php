<x-app-layout title="Promociones - Mama2s Gym">

    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Promociones Especiales</h1>
                <p class="text-xl text-gray-600">Aprovecha nuestras ofertas limitadas</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Promoción 1 -->
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-8 text-white">
                    <div class="mb-4">
                        <span class="bg-gray-900 text-orange-500 px-3 py-1 rounded-full text-sm font-semibold">
                            NUEVO MIEMBRO
                        </span>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Primer Mes Gratis</h2>
                    <p class="text-lg mb-6">
                        Únete ahora y obtén tu primer mes completamente gratis. Sin letra pequeña, sin compromisos ocultos.
                    </p>
                    <ul class="space-y-2 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Válido para nuevos miembros
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Aplicable a cualquier plan
                        </li>
                    </ul>
                    <a href="{{ route('register') }}" class="inline-block bg-gray-900 hover:bg-gray-800 text-white px-8 py-3 rounded-md font-semibold transition-colors">
                        Aprovechar Oferta
                    </a>
                </div>

                <!-- Promoción 2 -->
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-lg shadow-lg p-8 text-white">
                    <div class="mb-4">
                        <span class="bg-orange-500 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold">
                            TEMPORADA
                        </span>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">50% de Descuento</h2>
                    <p class="text-lg mb-6">
                        Oferta especial de temporada. Obtén un 50% de descuento en tu inscripción y primer mes.
                    </p>
                    <ul class="space-y-2 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Descuento en inscripción
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Descuento en primer mes
                        </li>
                    </ul>
                    <a href="{{ route('register') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-gray-900 px-8 py-3 rounded-md font-semibold transition-colors">
                        Aprovechar Oferta
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

