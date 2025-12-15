<x-app-layout title="Suscripciones - Mama2s Gym">
    <div class="bg-[#0B0B0B] py-12 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-white mb-4">Suscripciones</h1>
                <p class="text-xl text-[#B0B0B0]">Elige el plan que mejor se adapte a tus necesidades</p>
            </div>

            <!-- Mensajes de éxito/error -->
            @if(session('success'))
                <div class="mb-6 bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-500/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Información de suscripción actual -->
            @if($cliente && $cliente->membresia_id && $cliente->subscription_status == 'active')
                <div class="mb-8 bg-[#1E1E1E] border {{ $cliente->activo ? 'border-[#FFC107]/30' : 'border-red-500/30' }} rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            @if($cliente->activo)
                                <h3 class="text-xl font-bold text-white mb-2">Suscripción Activa</h3>
                            @else
                                <h3 class="text-xl font-bold text-red-400 mb-2">Suscripción Inactiva</h3>
                                <p class="text-red-300 text-sm mb-2">Tu cuenta está inactiva, por lo tanto tu membresía no está activa.</p>
                            @endif
                            <p class="text-[#B0B0B0]">
                                Plan: <span class="{{ $cliente->activo ? 'text-[#FFC107]' : 'text-gray-500' }} font-semibold">{{ $cliente->membresia->nombre }}</span>
                            </p>
                            @if($cliente->subscription_ends_at)
                                <p class="text-[#B0B0B0] text-sm mt-1">
                                    Renovación: {{ $cliente->subscription_ends_at->format('d/m/Y') }}
                                </p>
                            @endif
                        </div>
                        @if($cliente->activo)
                            <form action="{{ route('subscriptions.cancel') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas cancelar tu suscripción?');">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors">
                                    Cancelar Suscripción
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Grid de membresías -->
            @if($membresias->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    @foreach($membresias as $index => $membresia)
                        @php
                            $isPopular = $index == 1;
                            $isCurrentPlan = $cliente && $cliente->membresia_id == $membresia->id && $cliente->subscription_status == 'active' && $cliente->activo;
                        @endphp
                        
                        <div class="bg-[#1E1E1E] rounded-lg shadow-lg p-8 hover:shadow-xl transition-shadow {{ $isPopular ? 'border-2 border-[#FFC107]/50 ring-2 ring-[#FFC107]/20' : '' }} relative">
                            @if($isPopular)
                                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 z-10">
                                    <span class="bg-[#FFC107] text-black px-4 py-1 rounded-full text-sm font-semibold shadow-lg">
                                        ⭐ MÁS POPULAR
                                    </span>
                                </div>
                            @endif

                            @if($isCurrentPlan)
                                <div class="absolute top-4 right-4">
                                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        Plan Actual
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
                                @if($isCurrentPlan)
                                    <button disabled class="w-full bg-gray-600 text-gray-400 text-center py-3 rounded-md font-semibold cursor-not-allowed">
                                        Plan Actual
                                    </button>
                                @else
                                    <form action="{{ route('subscriptions.checkout', $membresia) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full bg-[#FFC107] hover:bg-[#FFD54F] text-black text-center py-3 rounded-md font-semibold transition-colors">
                                            Suscribirse Ahora
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Información de modo demo -->
                <div class="mt-12 bg-[#1E1E1E] border border-[#FFC107]/30 rounded-lg p-6">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-[#FFC107] mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-2">Modo Demo - Stripe Test</h3>
                            <p class="text-[#B0B0B0] text-sm mb-2">
                                Estás usando Stripe en modo de prueba. Puedes usar las siguientes tarjetas de prueba:
                            </p>
                            <ul class="text-[#B0B0B0] text-sm space-y-1">
                                <li>• <strong class="text-white">Tarjeta exitosa:</strong> 4242 4242 4242 4242</li>
                                <li>• <strong class="text-white">Fecha:</strong> Cualquier fecha futura (ej: 12/25)</li>
                                <li>• <strong class="text-white">CVC:</strong> Cualquier 3 dígitos (ej: 123)</li>
                                <li>• <strong class="text-white">Código postal:</strong> Cualquier 5 dígitos (ej: 12345)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-16">
                    <div class="bg-[#1E1E1E] rounded-lg p-8">
                        <svg class="mx-auto h-16 w-16 text-[#888888] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-2xl font-semibold text-white mb-2">No hay membresías disponibles</h3>
                        <p class="text-[#B0B0B0]">Vuelve pronto para ver nuestros planes.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

