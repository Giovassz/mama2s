<x-app-layout title="Mama2s Gym - Tu mejor versión empieza hoy">

    <!-- Hero Section -->
    <section class="relative bg-[#0B0B0B] text-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0B0B0B] via-[#1E1E1E] to-[#0B0B0B]"></div>
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 lg:py-40">
            <div class="text-center fade-in">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-white">
                    Mama2s <span class="text-[#FFC107]">Gym</span>
                </h1>
                <p class="text-2xl md:text-3xl mb-8 text-[#FFC107] font-semibold">
                    Tu mejor versión empieza hoy
                </p>
                <p class="text-lg md:text-xl mb-12 text-[#B0B0B0] max-w-3xl mx-auto leading-relaxed">
                    Transforma tu cuerpo, fortalece tu mente. Únete a la comunidad fitness más grande y alcanza tus objetivos con nosotros.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('membresias') }}" class="btn-primary text-lg px-10 py-4 inline-flex items-center justify-center">
                        Ver Planes
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <a href="{{ route('register') }}" class="btn-secondary text-lg px-10 py-4 inline-flex items-center justify-center">
                        Únete Ahora
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                 alt="Gimnasio" 
                 class="w-full h-full object-cover opacity-20">
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-[#0B0B0B]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 slide-up">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    ¿Por qué elegir <span class="text-[#FFC107]">Mama2s</span>?
                </h2>
                <p class="text-[#B0B0B0] text-lg md:text-xl">
                    Equipamiento de última generación y entrenadores profesionales
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card-hover text-center slide-up" style="animation-delay: 0.1s">
                    <div class="bg-[#FFC107]/20 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Equipamiento Moderno</h3>
                    <p class="text-[#B0B0B0]">
                        Tecnología de punta y máquinas de última generación para tu entrenamiento.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="card-hover text-center slide-up" style="animation-delay: 0.2s">
                    <div class="bg-[#FFC107]/20 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Entrenadores Certificados</h3>
                    <p class="text-[#B0B0B0]">
                        Profesionales capacitados para guiarte en cada paso de tu transformación.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="card-hover text-center slide-up" style="animation-delay: 0.3s">
                    <div class="bg-[#FFC107]/20 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-[#FFC107]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Horarios Flexibles</h3>
                    <p class="text-[#B0B0B0]">
                        Entrena cuando quieras, desde las 6 AM hasta las 11 PM todos los días.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-[#1E1E1E] to-[#0B0B0B] border-t border-[#2A2A2A]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center slide-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white">
                ¿Listo para comenzar tu <span class="text-[#FFC107]">transformación</span>?
            </h2>
            <p class="text-xl text-[#B0B0B0] mb-10">
                Únete a miles de personas que ya están alcanzando sus objetivos
            </p>
            <a href="{{ route('register') }}" class="btn-primary text-lg px-12 py-5 inline-flex items-center justify-center">
                Comienza Ahora
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </section>
</x-app-layout>

