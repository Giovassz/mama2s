<x-app-layout title="Membresías - Mama2s Gym">
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Nuestros Planes de Membresía</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Elige el plan que mejor se adapte a tus objetivos</p>
            </div>

            @if($membresias->count() > 0)
                <!-- Grid de 3 columnas con cards verticales tipo label -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                    @foreach($membresias as $index => $membresia)
                        @php
                            $isPopular = $index == 1; // El segundo plan es el más popular
                            $bgGradient = $isPopular 
                                ? 'bg-gradient-to-b from-orange-500 via-orange-500 to-orange-600' 
                                : 'bg-gradient-to-b from-white to-gray-50';
                            $borderColor = $isPopular ? 'border-2 border-orange-400' : 'border border-gray-200';
                            $textColor = $isPopular ? 'text-gray-900' : 'text-gray-900';
                            $textSecondary = $isPopular ? 'text-gray-800' : 'text-gray-600';
                            $checkColor = $isPopular ? 'text-gray-900' : 'text-orange-500';
                        @endphp
                        
                        <!-- Card vertical tipo label profesional -->
                        <div class="{{ $bgGradient }} {{ $borderColor }} rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 relative flex flex-col min-h-[500px]">
                            @if($isPopular)
                                <div class="absolute top-4 right-4 bg-gray-900 text-white px-4 py-2 rounded-full text-xs font-bold z-10 shadow-lg">
                                    ⭐ MÁS POPULAR
                                </div>
                            @endif
                            
                            <div class="flex-1 flex flex-col p-6">
                                <!-- Header con nombre -->
                                <div class="text-center mb-6">
                                    <h3 class="text-3xl font-bold {{ $textColor }} mb-2">{{ $membresia->nombre }}</h3>
                                    @if($membresia->descripcion)
                                        <p class="text-sm {{ $textSecondary }}">{{ Str::limit($membresia->descripcion, 80) }}</p>
                                    @endif
                                </div>

                                <!-- Precio destacado -->
                                <div class="text-center mb-8 pb-6 border-b {{ $isPopular ? 'border-gray-900' : 'border-gray-200' }}">
                                    <div class="flex items-baseline justify-center">
                                        <span class="text-5xl font-bold {{ $textColor }}">${{ number_format($membresia->precio, 0) }}</span>
                                        <span class="text-lg {{ $textSecondary }} ml-2">/{{ $membresia->duracion_formateada }}</span>
                                    </div>
                                    @if($membresia->duracion_dias >= 30)
                                        <p class="text-sm {{ $textSecondary }} mt-2">Aprox. ${{ number_format($membresia->precio / ($membresia->duracion_dias / 30), 2) }}/mes</p>
                                    @endif
                                </div>

                                <!-- Características -->
                                <ul class="flex-1 space-y-3 mb-6">
                                    @if($membresia->caracteristicas && count($membresia->caracteristicas) > 0)
                                        @foreach($membresia->caracteristicas as $caracteristica)
                                            <li class="flex items-start {{ $textSecondary }}">
                                                <svg class="w-5 h-5 {{ $checkColor }} mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm">{{ $caracteristica }}</span>
                                            </li>
                                        @endforeach
                                    @endif

                                    @if($membresia->sesiones_entrenador > 0)
                                        <li class="flex items-start {{ $textSecondary }}">
                                            <svg class="w-5 h-5 {{ $checkColor }} mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-semibold">
                                                {{ $membresia->sesiones_entrenador == 999 ? 'Entrenador personal ilimitado' : $membresia->sesiones_entrenador . ' ' . ($membresia->sesiones_entrenador == 1 ? 'sesión' : 'sesiones') . ' con entrenador' }}
                                            </span>
                                        </li>
                                    @endif

                                    @if($membresia->acceso_clases_grupales)
                                        <li class="flex items-start {{ $textSecondary }}">
                                            <svg class="w-5 h-5 {{ $checkColor }} mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm">Acceso ilimitado a clases grupales</span>
                                        </li>
                                    @endif

                                    @if($membresia->acceso_zona_vip)
                                        <li class="flex items-start {{ $textSecondary }}">
                                            <svg class="w-5 h-5 {{ $checkColor }} mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-semibold">Acceso exclusivo a zona VIP</span>
                                        </li>
                                    @endif

                                    @if($membresia->plan_nutricional)
                                        <li class="flex items-start {{ $textSecondary }}">
                                            <svg class="w-5 h-5 {{ $checkColor }} mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm">{{ $membresia->acceso_zona_vip ? 'Plan nutricional personalizado' : 'Plan nutricional incluido' }}</span>
                                        </li>
                                    @endif
                                </ul>

                                <!-- Botón CTA -->
                                <a href="{{ route('register') }}" class="mt-auto block w-full {{ $isPopular ? 'bg-gray-900 hover:bg-gray-800 text-white' : 'bg-orange-500 hover:bg-orange-600 text-gray-900' }} text-center py-4 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    Elegir {{ $membresia->nombre }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sección adicional -->
                <div class="text-center">
                    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-4xl mx-auto">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">¿Necesitas más información?</h2>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="{{ route('promociones') }}" class="bg-orange-500 hover:bg-orange-600 text-gray-900 px-6 py-3 rounded-xl font-semibold transition-colors">
                                Ver Promociones
                            </a>
                            <a href="{{ route('home') }}" class="bg-gray-900 hover:bg-gray-800 text-white px-6 py-3 rounded-xl font-semibold transition-colors">
                                Volver al Inicio
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-16">
                    <div class="bg-white rounded-2xl shadow-lg p-12 max-w-2xl mx-auto">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">No hay membresías disponibles</h3>
                        <p class="text-gray-600">Vuelve pronto para ver nuestros planes.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
