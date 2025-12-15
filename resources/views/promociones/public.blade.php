<x-app-layout title="Promociones - Mama2s Gym">
    <!-- Hero Section -->
    <section class="relative bg-[#0B0B0B] text-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0B0B0B] via-[#1E1E1E] to-[#0B0B0B]"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 lg:py-40">
            <div class="text-center fade-in">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-white">
                    <span class="text-[#FFC107]">Promociones</span> Especiales
                </h1>
                <p class="text-2xl md:text-3xl mb-8 text-[#FFC107] font-semibold">
                    Aprovecha nuestras ofertas exclusivas
                </p>
                <p class="text-lg md:text-xl mb-12 text-[#B0B0B0] max-w-3xl mx-auto leading-relaxed">
                    Ofertas limitadas diseñadas para que comiences tu transformación hoy. No pierdas esta oportunidad única.
                </p>
            </div>
        </div>
        
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                 alt="Promociones" 
                 class="w-full h-full object-cover opacity-20">
        </div>
    </section>

    <!-- Promociones Section -->
    <section class="py-20 bg-[#0B0B0B]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($promociones->count() > 0)
                <!-- Grid de 3 columnas con cards verticales -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    @foreach($promociones as $index => $promocion)
                        @php
                            $isVigente = $promocion->estaVigente();
                        @endphp
                        
                        <!-- Card vertical tipo label profesional -->
                        <div class="card-hover {{ $isVigente ? 'border-2 border-[#FFC107]/50 ring-2 ring-[#FFC107]/20' : '' }} relative slide-up" style="animation-delay: {{ $index * 0.1 }}s">
                            @if($isVigente)
                                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 z-10">
                                    <span class="badge-dark bg-[#10B981] text-white px-4 py-1 shadow-lg">
                                        ✓ VIGENTE
                                    </span>
                                </div>
                            @endif
                            
                            <div class="flex-1 flex flex-col">
                                <!-- Header con título -->
                                <div class="text-center mb-6">
                                    <h3 class="text-2xl font-bold text-white mb-4">{{ $promocion->titulo }}</h3>
                                    
                                    <!-- Descuento destacado -->
                                    <div class="inline-block bg-[#FFC107] text-black px-6 py-3 rounded-xl font-bold text-3xl mb-4 shadow-lg">
                                        {{ $promocion->descuento_formateado }} OFF
                                    </div>
                                </div>

                                <!-- Información de membresía -->
                                <div class="mb-6 pb-6 border-b border-[#2A2A2A]">
                                    @if($promocion->membresia)
                                        <p class="text-sm text-[#B0B0B0] mb-3 text-center">
                                            <span class="font-semibold text-white">Aplica a:</span><br>
                                            <span class="text-base font-bold text-white">{{ $promocion->membresia->nombre }}</span>
                                        </p>
                                        @if($promocion->precio_con_descuento)
                                            <div class="text-center">
                                                <span class="text-[#888888] line-through text-lg mr-2">${{ number_format($promocion->membresia->precio, 0) }}</span>
                                                <span class="text-3xl font-bold text-[#FFC107]">${{ number_format($promocion->precio_con_descuento, 0) }}</span>
                                            </div>
                                        @endif
                                    @else
                                        <p class="text-sm text-[#B0B0B0] font-semibold text-center text-white">
                                            Aplica a todas las membresías
                                        </p>
                                    @endif
                                </div>

                                <!-- Descripción -->
                                @if($promocion->descripcion)
                                    <div class="flex-1 mb-6">
                                        <p class="text-sm text-[#B0B0B0] text-center leading-relaxed">{{ $promocion->descripcion }}</p>
                                    </div>
                                @endif

                                <!-- Fechas -->
                                <div class="mb-8 space-y-2">
                                    <div class="flex items-center justify-center text-sm text-[#B0B0B0]">
                                        <svg class="w-4 h-4 text-[#FFC107] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="font-semibold">Desde:</span>
                                        <span class="ml-2">{{ $promocion->fecha_inicio->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="flex items-center justify-center text-sm text-[#B0B0B0]">
                                        <svg class="w-4 h-4 text-[#FFC107] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="font-semibold">Hasta:</span>
                                        <span class="ml-2">{{ $promocion->fecha_fin->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                                <!-- Botón CTA -->
                                <a href="{{ route('membresias') }}" class="btn-primary w-full text-center py-4">
                                    Ver Membresías
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Call to Action -->
                <div class="text-center">
                    <div class="card slide-up" style="animation-delay: 0.4s">
                        <h2 class="text-3xl font-bold text-white mb-4">¿Listo para comenzar?</h2>
                        <p class="text-lg text-[#B0B0B0] mb-6">Únete a Mama2s Gym y transforma tu vida hoy</p>
                        <a href="{{ route('register') }}" class="btn-primary inline-block">
                            Regístrate Ahora
                        </a>
                    </div>
                </div>
            @else
                <div class="text-center py-16">
                    <div class="card slide-up">
                        <svg class="mx-auto h-16 w-16 text-[#888888] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                        <h3 class="text-2xl font-semibold text-white mb-2">No hay promociones disponibles</h3>
                        <p class="text-[#B0B0B0]">Vuelve pronto para conocer nuestras ofertas especiales</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
