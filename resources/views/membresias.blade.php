<x-app-layout title="Membresías - Mama2s Gym">

    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Nuestros Planes</h1>
                <p class="text-xl text-gray-600">Elige el plan que mejor se adapte a tus necesidades</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Plan Básico -->
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-shadow">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Plan Básico</h3>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-gray-900">$29</span>
                        <span class="text-gray-600">/mes</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Acceso a todas las áreas
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Sin límite de visitas
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            App móvil incluida
                        </li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-gray-900 hover:bg-gray-800 text-white text-center py-3 rounded-md font-semibold transition-colors">
                        Elegir Plan
                    </a>
                </div>

                <!-- Plan Premium -->
                <div class="bg-orange-500 rounded-lg shadow-lg p-8 hover:shadow-xl transition-shadow transform scale-105">
                    <div class="bg-gray-900 text-white px-3 py-1 rounded-full text-sm font-semibold inline-block mb-4">
                        MÁS POPULAR
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Plan Premium</h3>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-gray-900">$49</span>
                        <span class="text-gray-900">/mes</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-900">
                            <svg class="w-5 h-5 text-gray-900 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Todo del Plan Básico
                        </li>
                        <li class="flex items-center text-gray-900">
                            <svg class="w-5 h-5 text-gray-900 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Entrenador personal (2 sesiones/mes)
                        </li>
                        <li class="flex items-center text-gray-900">
                            <svg class="w-5 h-5 text-gray-900 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Acceso a clases grupales
                        </li>
                        <li class="flex items-center text-gray-900">
                            <svg class="w-5 h-5 text-gray-900 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Plan nutricional incluido
                        </li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-gray-900 hover:bg-gray-800 text-white text-center py-3 rounded-md font-semibold transition-colors">
                        Elegir Plan
                    </a>
                </div>

                <!-- Plan VIP -->
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-shadow">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Plan VIP</h3>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-gray-900">$79</span>
                        <span class="text-gray-600">/mes</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Todo del Plan Premium
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Entrenador personal ilimitado
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Acceso a zona VIP
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Consultas nutricionales ilimitadas
                        </li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full bg-orange-500 hover:bg-orange-600 text-gray-900 text-center py-3 rounded-md font-semibold transition-colors">
                        Elegir Plan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

