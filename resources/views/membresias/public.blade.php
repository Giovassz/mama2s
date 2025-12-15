<x-app-layout title="Membresías - Mama2s Gym">
    <!-- Hero Section -->
    <section class="relative bg-[#0B0B0B] text-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0B0B0B] via-[#1E1E1E] to-[#0B0B0B]"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 lg:py-40">
            <div class="text-center fade-in">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-white">
                    Nuestros <span class="text-[#FFC107]">Planes</span>
                </h1>
                <p class="text-2xl md:text-3xl mb-8 text-[#FFC107] font-semibold">
                    Elige el plan perfecto para ti
                </p>
                <p class="text-lg md:text-xl mb-12 text-[#B0B0B0] max-w-3xl mx-auto leading-relaxed">
                    Membresías diseñadas para adaptarse a tus objetivos y estilo de vida. Encuentra el plan ideal y comienza tu transformación hoy.
                </p>
            </div>
        </div>
        
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                 alt="Gimnasio" 
                 class="w-full h-full object-cover opacity-20">
        </div>
    </section>

    <!-- Membresías Section -->
    <section class="py-20 bg-[#0B0B0B]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($membresias->count() > 0)
                <!-- Grid de 3 columnas con cards verticales -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    @foreach($membresias as $index => $membresia)
                        @php
                            $isPopular = $index == 1; // El segundo plan es el más popular
                        @endphp
                        
                        <!-- Card vertical tipo label profesional -->
                        <div class="card-hover {{ $isPopular ? 'border-2 border-[#FFC107]/50 ring-2 ring-[#FFC107]/20' : '' }} relative slide-up" style="animation-delay: {{ $index * 0.1 }}s">
                            @if($isPopular)
                                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 z-10">
                                    <span class="badge-gold bg-[#FFC107] text-black px-4 py-1 shadow-lg">
                                        ⭐ MÁS POPULAR
                                    </span>
                                </div>
                            @endif
                            
                            <div class="flex-1 flex flex-col">
                                <!-- Header con nombre -->
                                <div class="text-center mb-6">
                                    <h3 class="text-3xl font-bold text-white mb-3">{{ $membresia->nombre }}</h3>
                                    @if($membresia->descripcion)
                                        <p class="text-sm text-[#B0B0B0]">{{ Str::limit($membresia->descripcion, 80) }}</p>
                                    @endif
                                </div>

                                <!-- Precio destacado -->
                                <div class="text-center mb-8 pb-6 border-b border-[#2A2A2A]">
                                    <div class="flex items-baseline justify-center">
                                        <span class="text-5xl font-bold text-[#FFC107]">${{ number_format($membresia->precio, 0) }}</span>
                                        <span class="text-lg text-[#B0B0B0] ml-2">/{{ $membresia->duracion_formateada }}</span>
                                    </div>
                                    @if($membresia->duracion_dias >= 30)
                                        <p class="text-sm text-[#888888] mt-2">Aprox. ${{ number_format($membresia->precio / ($membresia->duracion_dias / 30), 2) }}/mes</p>
                                    @endif
                                </div>

                                <!-- Características -->
                                <ul class="flex-1 space-y-3 mb-8">
                                    @if($membresia->caracteristicas && count($membresia->caracteristicas) > 0)
                                        @foreach($membresia->caracteristicas as $caracteristica)
                                            <li class="flex items-start text-[#B0B0B0]">
                                                <svg class="w-5 h-5 text-[#FFC107] mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm">{{ $caracteristica }}</span>
                                            </li>
                                        @endforeach
                                    @endif

                                    @if($membresia->sesiones_entrenador > 0)
                                        <li class="flex items-start text-[#B0B0B0]">
                                            <svg class="w-5 h-5 text-[#FFC107] mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-semibold text-white">
                                                {{ $membresia->sesiones_entrenador == 999 ? 'Entrenador personal ilimitado' : $membresia->sesiones_entrenador . ' ' . ($membresia->sesiones_entrenador == 1 ? 'sesión' : 'sesiones') . ' con entrenador' }}
                                            </span>
                                        </li>
                                    @endif

                                    @if($membresia->acceso_clases_grupales)
                                        <li class="flex items-start text-[#B0B0B0]">
                                            <svg class="w-5 h-5 text-[#FFC107] mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm">Acceso ilimitado a clases grupales</span>
                                        </li>
                                    @endif

                                    @if($membresia->acceso_zona_vip)
                                        <li class="flex items-start text-[#B0B0B0]">
                                            <svg class="w-5 h-5 text-[#FFC107] mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm font-semibold text-white">Acceso exclusivo a zona VIP</span>
                                        </li>
                                    @endif

                                    @if($membresia->plan_nutricional)
                                        <li class="flex items-start text-[#B0B0B0]">
                                            <svg class="w-5 h-5 text-[#FFC107] mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm">{{ $membresia->acceso_zona_vip ? 'Plan nutricional personalizado' : 'Plan nutricional incluido' }}</span>
                                        </li>
                                    @endif
                                </ul>

                                <!-- Botón CTA -->
                                <a href="{{ route('register') }}" class="btn-primary w-full text-center py-4">
                                    Elegir {{ $membresia->nombre }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sección adicional -->
                <div class="text-center">
                    <div class="card slide-up" style="animation-delay: 0.4s">
                        <h2 class="text-3xl font-bold text-white mb-4">¿Necesitas más información?</h2>
                        <p class="text-[#B0B0B0] mb-6 text-lg">Consulta nuestras promociones especiales o contáctanos</p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="{{ route('promociones') }}" class="btn-primary">
                                Ver Promociones
                            </a>
                            <a href="{{ route('home') }}" class="btn-secondary">
                                Volver al Inicio
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-16">
                    <div class="card slide-up">
                        <svg class="mx-auto h-16 w-16 text-[#888888] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-2xl font-semibold text-white mb-2">No hay membresías disponibles</h3>
                        <p class="text-[#B0B0B0]">Vuelve pronto para ver nuestros planes.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
