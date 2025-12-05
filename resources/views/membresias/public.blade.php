<x-app-layout title="Membresías - Mama2s Gym">
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Nuestros Planes</h1>
                <p class="text-xl text-gray-600">Elige el plan que mejor se adapte a tus necesidades</p>
            </div>

            @if($membresias->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($membresias as $index => $membresia)
                        <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition-shadow {{ $index == 1 ? 'lg:scale-105 relative' : '' }}">
                            @if($index == 1)
                                <div class="absolute top-4 right-4 bg-gray-900 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    MÁS POPULAR
                                </div>
                            @endif
                            
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $membresia->nombre }}</h3>
                            
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900">${{ number_format($membresia->precio, 2) }}</span>
                                <span class="text-gray-600">/{{ $membresia->duracion_formateada }}</span>
                            </div>

                            @if($membresia->descripcion)
                                <p class="text-gray-600 mb-6">{{ $membresia->descripcion }}</p>
                            @endif

                            <ul class="space-y-3 mb-8">
                                @if($membresia->caracteristicas && count($membresia->caracteristicas) > 0)
                                    @foreach($membresia->caracteristicas as $caracteristica)
                                        <li class="flex items-center text-gray-600">
                                            <svg class="w-5 h-5 text-orange-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span>{{ $caracteristica }}</span>
                                        </li>
                                    @endforeach
                                @endif

                                @if($membresia->sesiones_entrenador > 0)
                                    <li class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 text-orange-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ $membresia->sesiones_entrenador }} {{ $membresia->sesiones_entrenador == 1 ? 'sesión' : 'sesiones' }} con entrenador</span>
                                    </li>
                                @endif

                                @if($membresia->acceso_clases_grupales)
                                    <li class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 text-orange-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Acceso a clases grupales</span>
                                    </li>
                                @endif

                                @if($membresia->acceso_zona_vip)
                                    <li class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 text-orange-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Acceso a zona VIP</span>
                                    </li>
                                @endif

                                @if($membresia->plan_nutricional)
                                    <li class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 text-orange-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        <span>Plan nutricional incluido</span>
                                    </li>
                                @endif
                            </ul>

                            @auth
                                @if(Auth::user()->isCliente())
                                    <a href="{{ route('cliente.dashboard') }}" class="block w-full bg-orange-500 hover:bg-orange-600 text-gray-900 text-center py-3 rounded-md font-semibold transition-colors">
                                        Elegir Plan
                                    </a>
                                @else
                                    <a href="{{ route('register') }}" class="block w-full bg-orange-500 hover:bg-orange-600 text-gray-900 text-center py-3 rounded-md font-semibold transition-colors">
                                        Elegir Plan
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('register') }}" class="block w-full bg-orange-500 hover:bg-orange-600 text-gray-900 text-center py-3 rounded-md font-semibold transition-colors">
                                    Elegir Plan
                                </a>
                            @endauth
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg mb-4">No hay membresías disponibles en este momento.</p>
                    <p class="text-gray-400">Vuelve pronto para ver nuestros planes.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

