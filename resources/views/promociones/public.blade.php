<x-app-layout title="Promociones - Mama2s Gym">
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Promociones Especiales</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Aprovecha nuestras ofertas exclusivas y comienza tu transformación hoy</p>
            </div>

            @if($promociones->count() > 0)
                <!-- Grid de 3 columnas con cards verticales tipo label -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                    @foreach($promociones as $promocion)
                        @php
                            $isVigente = $promocion->estaVigente();
                            $bgGradient = $isVigente 
                                ? 'bg-gradient-to-b from-orange-500 via-orange-500 to-orange-600' 
                                : 'bg-gradient-to-b from-white to-gray-50';
                            $borderColor = $isVigente ? 'border-2 border-orange-400' : 'border border-gray-200';
                            $textColor = $isVigente ? 'text-gray-900' : 'text-gray-900';
                            $textSecondary = $isVigente ? 'text-gray-800' : 'text-gray-600';
                        @endphp
                        
                        <!-- Card vertical tipo label profesional -->
                        <div class="{{ $bgGradient }} {{ $borderColor }} rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 relative flex flex-col min-h-[450px]">
                            @if($isVigente)
                                <div class="absolute top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-full text-xs font-bold z-10 shadow-lg">
                                    ✓ VIGENTE
                                </div>
                            @endif
                            
                            <div class="flex-1 flex flex-col p-6">
                                <!-- Header con título -->
                                <div class="text-center mb-6">
                                    <h3 class="text-2xl font-bold {{ $textColor }} mb-4">{{ $promocion->titulo }}</h3>
                                    
                                    <!-- Descuento destacado -->
                                    <div class="inline-block {{ $isVigente ? 'bg-gray-900' : 'bg-orange-500' }} {{ $isVigente ? 'text-white' : 'text-gray-900' }} px-6 py-3 rounded-xl font-bold text-3xl mb-4 shadow-lg">
                                        {{ $promocion->descuento_formateado }} OFF
                                    </div>
                                </div>

                                <!-- Información de membresía -->
                                <div class="mb-6 pb-6 border-b {{ $isVigente ? 'border-gray-900' : 'border-gray-200' }}">
                                    @if($promocion->membresia)
                                        <p class="text-sm {{ $textSecondary }} mb-3 text-center">
                                            <span class="font-semibold">Aplica a:</span><br>
                                            <span class="text-base font-bold">{{ $promocion->membresia->nombre }}</span>
                                        </p>
                                        @if($promocion->precio_con_descuento)
                                            <div class="text-center">
                                                <span class="text-gray-400 line-through text-lg mr-2">${{ number_format($promocion->membresia->precio, 0) }}</span>
                                                <span class="text-3xl font-bold {{ $isVigente ? 'text-gray-900' : 'text-orange-600' }}">${{ number_format($promocion->precio_con_descuento, 0) }}</span>
                                            </div>
                                        @endif
                                    @else
                                        <p class="text-sm {{ $textSecondary }} font-semibold text-center">
                                            Aplica a todas las membresías
                                        </p>
                                    @endif
                                </div>

                                <!-- Descripción -->
                                @if($promocion->descripcion)
                                    <div class="flex-1 mb-6">
                                        <p class="text-sm {{ $textSecondary }} text-center leading-relaxed">{{ $promocion->descripcion }}</p>
                                    </div>
                                @endif

                                <!-- Fechas -->
                                <div class="mb-6 space-y-2">
                                    <div class="flex items-center justify-center text-sm {{ $textSecondary }}">
                                        <svg class="w-4 h-4 {{ $isVigente ? 'text-gray-900' : 'text-orange-500' }} mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="font-semibold">Desde:</span>
                                        <span class="ml-2">{{ $promocion->fecha_inicio->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="flex items-center justify-center text-sm {{ $textSecondary }}">
                                        <svg class="w-4 h-4 {{ $isVigente ? 'text-gray-900' : 'text-orange-500' }} mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="font-semibold">Hasta:</span>
                                        <span class="ml-2">{{ $promocion->fecha_fin->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                                <!-- Botón CTA -->
                                <a href="{{ route('membresias') }}" class="mt-auto block w-full {{ $isVigente ? 'bg-gray-900 hover:bg-gray-800 text-white' : 'bg-orange-500 hover:bg-orange-600 text-gray-900' }} text-center py-4 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    Ver Membresías
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Call to Action -->
                <div class="text-center">
                    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-4xl mx-auto">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">¿Listo para comenzar?</h2>
                        <p class="text-lg text-gray-600 mb-6">Únete a Mama2s Gym y transforma tu vida hoy</p>
                        <a href="{{ route('register') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-gray-900 px-8 py-3 rounded-xl font-semibold transition-colors">
                            Regístrate Ahora
                        </a>
                    </div>
                </div>
            @else
                <div class="text-center py-16">
                    <div class="bg-white rounded-2xl shadow-lg p-12 max-w-2xl mx-auto">
                        <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No hay promociones disponibles</h3>
                        <p class="text-gray-600">Vuelve pronto para conocer nuestras ofertas especiales</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
